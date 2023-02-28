<?php namespace App\Controllers;

use App\Models\MuridModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Response;
use Exception;
 
class Murid extends BaseController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $model = new MuridModel();
        $data = $model->getAllMurid();
        return $this->respond($data);
    }
 
    // get single product
    public function show($id)
    {
        try {
            $model = new MuridModel();
            $data = $model->MuridById($id);

            return $this->getResponse(
                [
                    'message' => 'Murid retrieved successfully',
                    'murid' => $data
                ]
            );
        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'message' => 'Could not find murid for specified ID'
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
 
    // create a product
    public function create()
    {
        $model = new MuridModel();
        $data = [
            'nama_murid' => $this->request->getVar('nama_murid'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telp_murid' => $this->request->getVar('telp_murid'),
            'alamat_murid' => $this->request->getVar('alamat_murid'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }
 
    // update product
    public function update($id = null){

		helper(['form', 'array']);

		$rules = [
			'nama_murid' => 'required',
			'jenis_kelamin' => 'required',
			'telp_murid' => 'required',
			'alamat_murid' => 'required',
		];
			$data = [
			'nama_murid' => $this->request->getVar('nama_murid'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telp_murid' => $this->request->getVar('telp_murid'),
            'alamat_murid' => $this->request->getVar('alamat_murid'),

			];
            $model = new MuridModel();
            $model->save($data);
			return $this->respond($data);
		

	}
 
    // delete product
    public function delete($id = null)
    {
        $model = new MuridModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
         
    }
 
}