# ci-restserver
Check the recent version at https://github.com/chriskacerguis/codeigniter-restserver

My alternate version https://github.com/ardisaurus/old-rest-ci

#cara pakai
1. download semua
2. extract terus pindah ke htdocs
3. buat database

(sesuaikan nama database dengan file database yang saya upload "rest-server" jika menggunakan nama database berbeda silahkan ubah konfigurasi pada folder "/application/config/database" scroll kebawah cari konfigurasi database rubah sesuai nama database anda"

4. upload/import database yang ada di folder download tadi ke database yang telah di buat
5. coba buka http://localhost/rest-server/welcome ( jika bekerja maka akan muncul halaman welcome default codeigniter

#fungsi pada rest server
1. get data kost
cara cek dengan aplikasi postman 
-copy url berikut http://localhost/rest-server/api/kost/index
http://localhost/rest-server/api/kost/index (untuk mendapatkan semua data kost) dengan method get
http://localhost/rest-server/api/kost/index?idkost=12 (untuk mendapatkan data by id) dengan method get
2. update data kost 

cara cek dengan aplikasi postman
-copy url berikut http://localhost/rest-server/api/kost/index
lalu rubah method menjadi PUT
lalu pilih body -> x.www-form-urlencode
masukan key dan value
key = "atribut" samakan dengan atribut database table kost
value = "isi atau value"
3. insert data kost
cek menggunakan postman juga
lalu rubah method menjadi POST
tutorial sama kek update
4. delete data kost
cara cek dengan aplikasi postman
-copy url berikut http://localhost/rest-server/api/kost/index
lalu rubah method menjadi DELETE
lalu pilih body -> x.www-form-urlencode
masukan key dan value
key = "idkost"
value = "idkost mana yang mau di hapus"
lalu send
5. get data kost by filter keterangan dan kota
http://localhost/rest-server/api/kost/indexbyfilter?keterangan=default&kota=default
default "ganti dengan keterangan yang mau di pakek" untuk default keterangan bisa di rubah dengan SOLD/AVAILABLE dan kota bisa dengan nama kost
