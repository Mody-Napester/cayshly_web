<?php

namespace App\Listeners;

use App\Imports\ProductImport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\Excel\Facades\Excel;

class UploadAndImportProductListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $data['filepath'] = $event->filepath;
        $data['brand_id'] = $event->brand_id;
        $data['store_id'] = $event->store_id;
        $data['lookup_condition_id'] = $event->lookup_condition_id;
        $data['category'] = $event->category;

        Excel::import(new ProductImport($data), $event->filepath);
    }
}
