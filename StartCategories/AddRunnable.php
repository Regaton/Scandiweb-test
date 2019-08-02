<?php
namespace StartCategories;

interface AddRunnable // Interface of executive classes
{
    public function AddData(array $data);
    public function AddField(array $params = []);
    public function DeleteField(array $ItemID);
}