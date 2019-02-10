<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\Settings\SettingRepository;
use App\Http\Transformers\SettingTransformer;

class SettingController extends ApiController
{
    protected $validationRules = [
        'name'   => 'required|unique:settings,name',
        'slug'   => 'required|unique:settings,slug',
        'type'   => 'in:',
        'value'  => 'required',
        'status' => 'boolean',
    ];
    protected $validationMessages = [
        'name.required'  => 'Tên thông tin không được để trống',
        'name.unique'    => 'Tên thông tin đã tồn tại trên hệ thống',
        'slug.required'  => 'Slug không được để trống',
        'slug.unique'    => 'Slug đã tồn tại trên hệ thống',
        'type.in'        => 'Kiểu dữ liệu không hợp lệ',
        'value.required' => 'Giá trị không được để trống',
        'status.boolean' => 'Trạng thái không hợp lệ',
    ];

    /**
     * SettingController constructor.
     * @param SettingRepository $setting
     */
    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
        $this->setTransformer(new SettingTransformer);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('setting.view');
        $pageSize = $request->get('limit', 25);
        return $this->successResponse($this->setting->getByQuery($request->all(), $pageSize));
    }

    public function changeStatus($id)
    {
        try {
            $this->authorize('setting.update');
            $data = $this->setting->changeStatus($id);

            return $this->successResponse($data);
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

    public function show($id)
    {
        try {
            $this->authorize('setting.view');
            return $this->successResponse($this->setting->getById($id));
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
        $this->validationRules['type'] .= $this->setting->getAllType();
        try {
            $this->authorize('setting.create');
            $this->validate($request, $this->validationRules, $this->validationMessages);
            $data = $this->setting->store($request->all());

            return $this->successResponse($data);
        } catch (\Illuminate\Validation\ValidationException $validationException) {
            return $this->errorResponse([
                'errors' => $validationException->validator->errors(),
                'exception' => $validationException->getMessage()
            ]);
        } catch (\Exception $e) {
            throw $e;
        } catch (\Throwable $t) {
            throw $t;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $test = $this->validationRules['name'] .= ',' . $id;
        $test = $this->validationRules['slug'] .= ',' . $id;
        $this->validationRules['type'] .= $this->setting->getAllType();
        try {
            $this->authorize('setting.update');
            $this->validate($request, $this->validationRules, $this->validationMessages);
            $model = $this->setting->update($id, $request->all());

            return $this->successResponse($model);
        } catch (\Illuminate\Validation\ValidationException $validationException) {
            return $this    ->errorResponse([
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

    public function destroy($id)
    {
        try{
            $this->authorize('setting.delete');
            $this->setting->delete($id);

            return $this->deleteResponse();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->notFoundResponse();
        } catch (\Exception $e) {
            throw $e;
        } catch (\Throwable $t) {
            throw $t;
        }
    }

    public function upload(Request $request)
    {
        try {
            $this->validate($request, [
                'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'file'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
            ], [
                'files.*.image' => 'File upload không đúng định dạng',
                'files.*.mimes' => 'File upload phải là 1 trong các định dạng: :values',
                'files.*.max'   => 'File upload không thể vượt quá :max KB',
                'file.image'    => 'File upload không đúng định dạng',
                'file.mimes'    => 'File upload phải là 1 trong các định dạng: :values',
                'file.max'      => 'File upload không thể vượt quá :max KB'
            ]);
            $image = $request->file('file');
            if ($request->input('resize')) {
                return $this->setting->upload($image);
            }
            return $this->setting->upload($image, false);
        } catch (\Illuminate\Validation\ValidationException $validationException) {
            return response(['data' => [
                'errors' => $validationException->validator->errors(),
                'exception' => $validationException->getMessage()
            ]])->json($data, 422);
        }
    }
}
