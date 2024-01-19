<?php

namespace App\Http\Controllers;

use App\Models\AuditTest;
use App\Models\User;
use Illuminate\Http\Request;

class MyTableController extends Controller
{
    public function __invoke()
    {
        return        AuditTest::all()->each(function ($item) {
            $item->update(['name' => 'param value']);;
        });;
        // dd(
        //     AuditTest::where('id', '9')->update(['name' => 'param value3'])

        // );

        ### такой запрос не работае  нужно пройти по each потом изменить  AuditTest::where('id',15)->update(['name' => 'param value123']);

        // AuditTest::create([
        //     'name' => 'param value',
        // ]);
        // // update
        // AuditTest::where('name', 'param value')->each(function ($item) {
        //     $item->update(['name' => 'param value2']);
        // });
        // or 
        // AuditTest::find(233)->update(['name' => 'param value3']);
        // // delete
        // AuditTest::find(233)->delete();
        // create
    }
}
