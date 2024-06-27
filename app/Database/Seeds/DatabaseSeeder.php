<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call('Pelanggan');
        $this->call('User');
        $this->call('TipeKamar');
        $this->call('Kamar');
        $this->call('Promosi');
        $this->call('Fasilitas');
        $this->call('FasilitasKamar');
        $this->call('Reservasi');
        $this->call('Pembayaran');
    }
}
