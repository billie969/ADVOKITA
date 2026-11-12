
<?php
$lines = file(__DIR__ . '/.env', FILE_IGNORE_NEW_LINES);
$env = [];

foreach ($lines as $line) {
    if (strpos($line, 'PG') === 0) {
        $parts = explode('=', $line, 2);
        $env[trim($parts[0])] = trim(trim($parts[1]), "\"'");
    }
}

try {
    $pdo = new PDO(
        'pgsql:host=' . $env['PGHOST'] .
        ';port=' . $env['PGPORT'] .
        ';dbname=' . $env['PGDATABASE'],
        $env['PGUSER'],
        $env['PGPASSWORD']
    );

    echo 'KONEKSI PDO LANGSUNG BERHASIL';
} catch (Throwable $e) {
    echo 'KONEKSI PDO GAGAL: ' . $e->getMessage();
}
