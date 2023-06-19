use Illuminate\Support\Facades\DB;

try {
    DB::connection()->getPdo();
    echo "Berhasil terhubung ke database";
} catch (\Exception $e) {
    echo "Gagal koneksi: " . $e->getMessage();
}
