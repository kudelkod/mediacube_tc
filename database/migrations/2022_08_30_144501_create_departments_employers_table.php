<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Enums\EmployersEnum;
use App\Models\Enums\DepartmentsEnum;

return new class extends Migration {
    public function up()
    {
        Schema::create('departments_employers', function (Blueprint $table) {
            $table->unsignedBigInteger(DepartmentsEnum::table_departments_id);
            $table->unsignedBigInteger(EmployersEnum::table_employers_id);

            $table->foreign(DepartmentsEnum::table_departments_id)
                ->on(DepartmentsEnum::table_departments_name_table)
                ->references(DepartmentsEnum::table_departments_id);

            $table->foreign(EmployersEnum::table_employers_id)
                ->on(EmployersEnum::table_employers_name_table)
                ->references(EmployersEnum::table_employers_id);
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments_employers');
    }
};
