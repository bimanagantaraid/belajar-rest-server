# REST SERVER API KOSTKU

## Installing
cara menggunakan:

```
download belajar-rest-server.git
```
```
extract dan copy folder ke htdocs
```
```
-buat database dengan nama "rest-server" atau bisa dengan nama sesuai keiginan
-tapi jika menggunakan berbeda silahkan konfigurasi database terlebih 
dahulu di direcktori "application/config/database"
```
```
upload file database yang telah disediakan di folder hasil downloadtan tadi "rest-server.sql" 
silahkan import ke database yang telah di buat tadi
```

## fungsi yang tersedia
* CURD (data kost)
* filter data kost by keterangan dan kota

## cara test rest api
gunakan aplikasi postman
### GET DATA KOST
untuk get data kost by id dan semua data bisa dengan method GET

```
http://localhost/rest-server/api/kost/index

copy url di atas pastekan postman
* untuk by id "masukan idkost ke key dan value isi idkost yang mau di tampilkan"
* untuk semua data langsung klik send
```

### CREATE/INSERT DATA KOST
untuk insert/creat data kost baru dan rubah menjadi method POST pada postman

```
http://localhost/rest-server/api/kost/index

copy url di atas pastekan postman
* silahkan klik pada "table Body" di postman
* lalu pilih x-www-form-urleconded
* isi key dengan atribut yang ada pada table kost di database
* isi value dengan data kost yang mau diisi
* untuk idkost tidak usah tidak apa apa karna autoincrement, tapi kalau mau diisi bisa, tapi bisa bentok alhasil gagal
* klik send
```
### UPDATE DATA KOST
untuk UPDATE data kost dan rubah menjadi method PUT pada postman
```
http://localhost/rest-server/api/kost/index

copy url di atas pastekan postman
* silahkan klik pada "table Body" di postman
* lalu pilih x-www-form-urleconded
* sama seperti langkah langkah fungsi create tapi disini wajib 
menggunakan idkost pada key untuk bisa merubah
* klik send
```
### DELETE DATA KOST
untuk DELETE data kost dan rubah menjadi method DELETE pada postman
```
http://localhost/rest-server/api/kost/index

copy url di atas pastekan postman
* silahkan klik pada "table Body" di postman
* lalu pilih x-www-form-urleconded
* sama seperti langkah langkah fungsi create dan update tapi disini wajib 
menggunakan idkost pada key untuk bisa menghapus data
* klik send
```
### GET DATA KOST BY FILTER KETERANGAN DAN KOTA
untuk GET data kost by filtering dan rubah menjadi method GET pada postman
```
http://[::1]/rest-server/api/kost/indexbyfilter?keterangan=default&kota=default

copy url di atas pastekan postman
* rubah default pada key keterangan dengan "sold/available" dan kota dengan "namakota"
* klik send
```
