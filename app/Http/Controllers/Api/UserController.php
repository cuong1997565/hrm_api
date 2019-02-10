<?php

namespace App\Http\Controllers\Api;

use DB;
use Illuminate\Http\Request;
use App\Repositories\Users\UserRepository;
use App\Repositories\Contracts\ContractRepository;
use App\Http\Transformers\UserTransformer;
use App\Rules\DateExpirationRule;

class UserController extends ApiController
{
    protected $validationRules = [
        'name'     => 'required',
        'email'    => 'required|email|unique:users,email',
        'phone'    => 'required|digits_between:10,12',
        'password' => 'required|min:6|confirmed',
        'status'   => 'in:',
    ];

    protected $validationMessages = [
        'name.required'        => 'Tên đăng nhập không được để trông',
        'email.required'       => 'Email không được để trông',
        'email.unique'         => 'Email đã tồn tại trên hệ thống',
        'phone.required'       => 'Số điện thoại không được để trông',
        'phone.digits_between' => 'Số điện thoại không hợp lệ',
        'password.required'    => 'Mật khẩu không được để trống',
        'password.min'         => 'Mật khẩu phải có ít nhât :min ký tự',
        'password.confirmed'   => 'Nhập lại mật khẩu không đúng',
        'status.in'            => 'Trạng thái không hợp lệ',
    ];

    /**
     * UserController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
        $this->setTransformer(new UserTransformer);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('user.view');
        $pageSize = $request->get('limit', 25);
        return $this->successResponse($this->user->getByQuery($request->all(), $pageSize));
    }

    public function changeStatus($id)
    {
        try {
            $this->authorize('user.update');
            $this->user->changeStatus($id);
            return $this->successResponse(['data' => ['message' => 'Cập nhật trạng thái thành công']], false);
        } catch (\Illuminate\Validation\ValidationException $validationException) {
            return $this->errorResponse([
                'errors' => $validationException->validator->errors(),
                'exception' => $validationException->getMessage()
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->notFoundResponse();
        } catch (\Exception $e) {
            throw $e;
        } catch (\Throwable $t) {
            throw $t;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            $this->authorize('user.view');
            return $this->successResponse($this->user->getById($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->notFoundResponse();
        } catch (\Exception $e) {
            throw $e;
        } catch (\Throwable $t) {
            throw $t;
        }
    }

    public function store(Request $request)
    {
        $this->validationRules['status'] .= $this->user->getAllStatus();
        DB::beginTransaction();
        try {
            $this->authorize('user.create');
            $this->validate($request, $this->validationRules, $this->validationMessages);
            $data = $this->user->store($request->all());
            DB::commit();
            return $this->successResponse($data);
        } catch (\Illuminate\Validation\ValidationException $validationException) {
            DB::rollback();
            return $this->errorResponse([
                'errors' => $validationException->validator->errors(),
                'exception' => $validationException->getMessage()
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $t) {
            DB::rollback();
            throw $t;
        }
    }

    public function update(Request $request, $id)
    {
        $this->validationRules['email'] .= ',' . $id;
        $this->validationRules['status'] .= $this->user->getAllStatus();
        unset($this->validationRules['password']);
        DB::beginTransaction();
        try {
            $this->authorize('user.update');
            $this->validate($request, $this->validationRules, $this->validationMessages);
            $model = $this->user->update($id, $request->all());
            DB::commit();
            return $this->successResponse($model);
        } catch (\Illuminate\Validation\ValidationException $validationException) {
            return $this    ->errorResponse([
                'errors' => $validationException->validator->errors(),
                'exception' => $validationException->getMessage()
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollback();
            return $this->notFoundResponse();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $t) {
            DB::rollback();
            throw $t;
        }
    }
    
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->authorize('user.delete');
            $this->user->delete($id);
            DB::commit();
            return $this->deleteResponse();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollback();
            return $this->notFoundResponse();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $t) {
            DB::rollback();
            throw $t;
        }
    }
}