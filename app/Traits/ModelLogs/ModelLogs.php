<?php


namespace App\Traits\ModelLogs;


use App\Models\ModelLog\ModelLog;
use Illuminate\Database\Eloquent\Model;


trait ModelLogs
{
    public function addLogCreated()
    {
        $this->createdLog(
            'created',
            json_encode($this->only($this->getFillable())),
            null
        );
    }

    public function addLogUpdated(Model $oldValue)
    {
        $this->createdLog(
            'updated',
//            json_encode($this->only($this->getFillable())),
//            json_encode($oldValue->only($oldValue->getFillable())),
        );
    }

    public function addLogDeleted()
    {
        $type = 'deleted';

        $this->createdLog(
            'deleted',
            null,
            json_encode($this->only($this->getFillable())),
        );
    }


    private function createdLog($type, $newValue, $oldValue)
    {
        ModelLog::create([
            'model_type' => $this->getTable(),
            'model_id'   => $this->id,
            'type'       => $type,
            'value_new'  => $newValue,
            'value_old'  => $oldValue
        ]);
    }

}
