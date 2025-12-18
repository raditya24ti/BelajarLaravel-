<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
public function run(): void
{
// Reset cache permission (Wajib agar tidak error)
app()[\Spatie\Permission\PermissionRegistrar::class]-
&gt;forgetCachedPermissions();
// role dengan huruf kecil
$roleAdmin = Role::firstOrCreate([&#39;name&#39; =&gt; &#39;admin&#39;]);
$roleUser = Role::firstOrCreate([&#39;name&#39; =&gt; &#39;user&#39;]);
// Buat Akun ADMIN
$admin = User::firstOrCreate(
[&#39;email&#39; =&gt; &#39;admin@gmail.com&#39;], // Cek email biar gak duplikat
[
&#39;name&#39; =&gt; &#39;Administrator&#39;,
&#39;password&#39; =&gt; Hash::make(&#39;password&#39;), // Passwordnya: password
]
);
$admin-&gt;assignRole($roleAdmin); // &lt;--- Kasih jabatan Admin
// Buat Akun USER BIASA
$user = User::firstOrCreate(
[&#39;email&#39; =&gt; &#39;user@gmail.com&#39;],
[
&#39;name&#39; =&gt; &#39;User Biasa&#39;,
&#39;password&#39; =&gt; Hash::make(&#39;password&#39;),
]
);
$user-&gt;assignRole($roleUser); // &lt;--- Kasih jabatan User
}
}
