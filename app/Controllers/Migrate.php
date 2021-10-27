<?php

namespace App\Controllers;

class Migrate extends \CodeIgniter\Controller
{
        public function index()
        {
            $migrate = \Config\Services::migrations();
            // $seeder = \Config\Database::seeder();

            try {
                    $migrate->latest();

                    // $seeder->call('AdminSeeder');

                    echo 'All Done';
            } catch (\Throwable $e) {
                echo 'Not all done';
            }
        }
}