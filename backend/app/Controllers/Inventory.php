<?php

namespace App\Controllers;

use App\Models\InventoryModel;

class Inventory extends BaseController
{
    public function index()
    {
        $model = new InventoryModel();
        $data['items'] = $model->findAll();

        return view('inventory/index', $data);
    }

    public function create()
    {
        return view('inventory/create');
    }

    public function store()
    {
        $model = new InventoryModel();

        $model->save([
            'item_name'   => $this->request->getPost('item_name'),
            'category'    => $this->request->getPost('category'),
            'quantity'    => $this->request->getPost('quantity'),
            'price'       => $this->request->getPost('price'),
            'expiry_date' => $this->request->getPost('expiry_date'),
        ]);

        return redirect()->to('/inventory');
    }

    public function edit($id)
    {
        $model = new InventoryModel();
        $data['item'] = $model->find($id);

        return view('inventory/edit', $data);
    }

    public function update($id)
    {
        $model = new InventoryModel();

        $model->update($id, [
            'item_name'   => $this->request->getPost('item_name'),
            'category'    => $this->request->getPost('category'),
            'quantity'    => $this->request->getPost('quantity'),
            'price'       => $this->request->getPost('price'),
            'expiry_date' => $this->request->getPost('expiry_date'),
        ]);

        return redirect()->to('/inventory');
    }

    public function delete($id)
    {
        $model = new InventoryModel();
        $model->delete($id);

        return redirect()->to('/inventory');
    }
}