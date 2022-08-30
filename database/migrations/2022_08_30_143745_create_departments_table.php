<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Enums\DepartmentsEnum;

return new class extends Migration {
    public function up()
    {
        Schema::create(DepartmentsEnum::table_departments_name_table, function (Blueprint $table) {
            $table->id(DepartmentsEnum::table_departments_id);
            $table->string(DepartmentsEnum::table_departments_name);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(DepartmentsEnum::table_departments_name_table);
    }
};
