<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Enums\EmployersEnum;

return new class extends Migration {
    public function up()
    {
        Schema::create(EmployersEnum::table_employers_name_table, function (Blueprint $table) {
            $table->id(EmployersEnum::table_employers_id);
            $table->string(EmployersEnum::table_employers_name, 50);
            $table->string(EmployersEnum::table_employers_surname, 50);
            $table->string(EmployersEnum::table_employers_patronymic, 50);
            $table->string(EmployersEnum::table_employers_sex, 6);
            $table->decimal(EmployersEnum::table_employers_salary, 8, 2, true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(EmployersEnum::table_employers_name_table);
    }
};
