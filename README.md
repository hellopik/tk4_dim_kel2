# TK-4 Introduction to Data and Information Management oleh Kelompok 2 Kelas DFBA
**Repository ini adalah bentuk pemenuhan TK-4 dengan pembangunan aplikasi CRUD dari class-class yang dipersyaratkan**

**Oleh Kelompok 2**
- Leo Tunggul Jesse - 2602269424
- Sarah Dhiena Fadhila - 2602269462
- Taufiq Mahendra - 2602269531
- Unggul Ammarramyaji Nuswantoro - 2602269361
- Yusuf Dwenva Gulo – 2602269506

**Penyiapan database awal untuk mengoperasikan aplikasi**

Query untuk penyiapan databasenya dapat diambil juga dari tugas TK3 pada minggu sebelumnya. Querynya adalah sebagai berikut

    CREATE SCHEMA db_tk3rev;
      
    CREATE TABLE HakAkses (  
      IdAkses INT PRIMARY KEY,  
      NamaAkses VARCHAR(50),  
      Keterangan VARCHAR(100)  
    );  
      
    CREATE TABLE Pengguna (  
      IdPengguna INT PRIMARY KEY,  
      NamaPengguna VARCHAR(50),  
      Password VARCHAR(50),  
      NamaDepan VARCHAR(50),  
      NamaBelakang VARCHAR(50),  
      NoHP VARCHAR(20),  
      Alamat VARCHAR(100),  
      IdAkses INT,  
     FOREIGN KEY (IdAkses) REFERENCES HakAkses(IdAkses)  
    );  
      
    CREATE TABLE Barang (  
      IdBarang INT PRIMARY KEY,  
      NamaBarang VARCHAR(50),  
      Keterangan VARCHAR(100),  
      Satuan VARCHAR(20),  
      IdPengguna INT,  
     FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna)  
    );  
      
    CREATE TABLE Pembelian (  
      IdPembelian INT PRIMARY KEY,  
      JumlahPembelian INT,  
      HargaBeli DECIMAL(10,2),  
      IdPengguna INT,  
      IdBarang INT,  
     FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna),  
     FOREIGN KEY (IdBarang) REFERENCES Barang(IdBarang)  
    );  
      
    CREATE TABLE Penjualan (  
      IdPenjualan INT PRIMARY KEY,  
      JumlahPenjualan INT,  
      HargaJual DECIMAL(10,2),  
      IdPengguna INT,  
      IdBarang INT,  
     FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna),  
     FOREIGN KEY (IdBarang) REFERENCES Barang(IdBarang)  
    );  
      
    INSERT INTO HakAkses (IdAkses, NamaAkses, Keterangan) VALUES  
    (1, 'Direktur', 'Pemimpin tertinggi perusahaan'),  
    (2, 'Admin', 'Admin perusahaan'),  
    (3, 'Help Desk', 'Pemberi bantuan dan informasi internal organisasi'),  
    (4, 'Customer Service', 'Pemberi bantuan dan arahan kepada pelanggan'),  
    (5, 'Departemen Gudang', 'Pengontrol persediaan barang'),  
    (6, 'Departemen Pembelian', 'Pengadaan dan pengelolaan material'),  
    (7, 'Departemen Penjualan', 'Penjualan dan pemasaran produk');  
      
    -- Menambahkan data pada tabel Pengguna  
    INSERT INTO Pengguna (IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHP, Alamat, IdAkses) VALUES  
    -- Direktur  
    (1, 'aldi_direktur', 'password', 'Aldi', 'Setiawan', '0812345678901', 'Jalan Sudirman No. 1', 1),  
      
    -- Admin  
    (2, 'budi_admin', 'password', 'Budi', 'Santoso', '0812345678902', 'Jalan Thamrin No. 2', 2),  
      
    -- Help Desk  
    (3, 'candra_help', 'password', 'Candra', 'Wijaya', '0812345678903', 'Jalan Kebon Jeruk No. 3', 3),  
      
    -- Customer Service  
    (4, 'lila_cs', 'password', 'Lila', 'Amalia', '081234555333', 'Jalan Kelapa Sawit No. 6', 4),  
      
    -- Departemen Gudang  
    (5, 'joni_gudang', 'password', 'Joni', 'Kecil', '081234123456', 'Jalan Griya Megah No. 2', 5),  
      
    -- Departemen Pembelian  
    (6, 'susi_beli', 'password', 'Susi', 'Susanti', '081234654321', 'Jalan Kemanggisan No. 1', 6),  
      
    -- Departemen Penjualan  
    (7, 'dudu_jual', 'password', 'Adudu', 'Santoso', '081234999321', 'Jalan Beo No. 5', 7);  
      
    -- Menambahkan data pada tabel Barang  
    -- *Catatan: IdPengguna yang dimaksud adalah staf gudang yang melakukan submit data stok barang  
    INSERT INTO Barang (IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna)  
    VALUES  
      (1, 'Laptop Asus X512DA', 'Laptop dengan prosesor AMD Ryzen 3 dan RAM 4GB', 'unit', 5),  
      (2, 'Mouse Logitech M221', 'Mouse wireless dengan sensor optikal dan DPI 1000', 'unit', 5),  
      (3, 'Keyboard Logitech K120', 'Keyboard USB dengan tombol empuk dan tahan banting', 'unit', 5),  
      (4, 'Monitor LG 24MK400H', 'Monitor LED 24 inci dengan resolusi 1366 x 768', 'unit', 5),  
      (5, 'Hard Disk Eksternal Toshiba Canvio Basic', 'Hard disk eksternal USB 3.0 dengan kapasitas 1TB', 'unit', 5),  
      (6, 'Flashdisk Sandisk Cruzer Blade', 'Flashdisk USB 2.0 dengan kapasitas 16GB', 'unit', 5),  
      (7, 'Webcam Logitech C270', 'Webcam dengan resolusi 720p dan built-in microphone', 'unit', 5),  
      (8, 'Printer HP Deskjet 2676', 'Printer all-in-one dengan WiFi dan fitur scan dan copy', 'unit', 5),  
      (9, 'Speaker Edifier R12U', 'Speaker USB dengan output suara yang jernih dan bass yang memukau', 'pasang', 5),  
      (10, 'Kabel HDMI 2.0', 'Kabel HDMI dengan panjang 1 meter dan support 4K', 'buah', 5),  
      (11, 'Router TP-Link TL-WR840N', 'Router WiFi dengan kecepatan 300 Mbps dan 2 antena', 'unit', 5),  
      (12, 'Modem Huawei E5577C', 'Modem 4G LTE dengan baterai yang tahan lama dan support 10 device', 'unit', 5),  
      (13, 'Headset Logitech H111', 'Headset dengan jack 3.5mm dan mikrofon noise-cancelling', 'unit', 5),  
      (14, 'Tinta Printer Canon PG-740', 'Tinta printer hitam untuk printer Canon', 'botol', 5),  
      (15, 'Stabilizer Matsunichi MC-500', 'Stabilizer untuk melindungi peralatan elektronik dari gangguan listrik', 'unit', 5),  
      (16, 'Battery Duracell AA', 'Battery AA alkaline dengan daya tahan yang lama', 'pak', 5),  
      (17, 'Cable Ties Kabelindo CT-8', 'Kabel ties dengan panjang 200mm dan lebar 3mm', 'pak', 5),  
      (18, 'Tool Kit 25 in 1', 'Set alat bongkar pasang peralatan elektronik dengan 25 jenis kepala obeng', 'unit', 5),  
      (19, 'Cooling Fan Arctic F8', 'Kipas pendingin dengan ukuran 80mm dan RPM 2000', 'unit', 5),  
      (20, 'Thermal Paste Noctua NT-H1', 'Pasta termal dengan kualitas premium untuk memperbaiki kinerja pendingin', 'unit', 5);  
      
    -- Menambahkan tabel Supplier  
    CREATE TABLE Supplier (  
      IdSupplier INT PRIMARY KEY,  
      Username VARCHAR(50),  
      Password VARCHAR(50),  
      NamaSupplier VARCHAR(50),  
      NoHP VARCHAR(20),  
      AlamatSupplier VARCHAR(100)  
    );  
      
    -- Menambahkan tabel Pelanggan  
    CREATE TABLE Pelanggan (  
      IdPelanggan INT PRIMARY KEY,  
      Username VARCHAR(50),  
      Password VARCHAR(50),  
      NamaPelanggan VARCHAR(50),  
      NoHP VARCHAR(20),  
      AlamatPelanggan VARCHAR(100)  
    );  
      
    -- Menambahkan foreign key IdSupplier pada tabel Pembelian  
    ALTER TABLE Pembelian ADD IdSupplier INT;  
    ALTER TABLE Pembelian ADD FOREIGN KEY (IdSupplier) REFERENCES Supplier(IdSupplier);  
      
    -- Menambahkan foreign key IdPelanggan pada tabel Penjualan  
    ALTER TABLE Penjualan ADD IdPelanggan INT;  
    ALTER TABLE Penjualan ADD FOREIGN KEY (IdPelanggan) REFERENCES Pelanggan(IdPelanggan);  
      
    -- Menambahkan data ke tabel Pelanggan  
    INSERT INTO Pelanggan (IdPelanggan, Username, Password, NamaPelanggan, NoHP, AlamatPelanggan)  
    VALUES  
    (1, 'dodi_pelanggan', 'password', 'Dodi Saputra', '0812345678904', 'Jalan Wahid Hasyim No. 4'),  
    (2, 'eka_pelanggan', 'password', 'Eka Hartono', '0812345678905', 'Jalan Pemuda No. 5'),  
    (3, 'fajar_pelanggan', 'password', 'Fajar Saputra', '0812345678906', 'Jalan Veteran No. 6'),  
    (4, 'gina_pelanggan', 'password', 'Gina Pratiwi', '0812345678907', 'Jalan Merdeka No. 7'),  
    (5, 'hendra_pelanggan', 'password', 'Hendra Gunawan', '0812345678908', 'Jalan Asia Afrika No. 8'),  
    (6, 'inda_pelanggan', 'password', 'Inda Ardelia', '0812345678909', 'Jalan Gatot Subroto No. 9'),  
    (7, 'joni_pelanggan', 'password', 'Joni Santoso', '0812345678910', 'Jalan Sudirman No. 10'),  
    (8, 'kiki_pelanggan', 'password', 'Kiki Saputra', '0812345678911', 'Jalan Ahmad Yani No. 11'),  
    (9, 'lina_pelanggan', 'password', 'Lina Nugraha', '0812345678912', 'Jalan Jenderal Sudirman No. 12'),  
    (10, 'maya_pelanggan', 'password', 'Maya Sari', '0812345678913', 'Jalan Diponegoro No. 13'),  
    (11, 'nina_pelanggan', 'password', 'Nina Santoso', '0812345678914', 'Jalan Cik Ditiro No. 14');  
      
    -- Menambahkan data ke tabel Supplier  
    INSERT INTO Supplier (IdSupplier, Username, Password, NamaSupplier, NoHP, AlamatSupplier)  
    VALUES  
    (1, 'yoga_supplier', 'password', 'Yoga Wijaya', '0812345678926', 'Jalan Sisingamangaraja No. 26'),  
    (2, 'zara_supplier', 'password', 'Zara Lim', '0812345678927', 'Jalan Jend. A. Yani No. 27'),  
    (3, 'anna_supplier', 'password', 'Anna Tan', '0812345678928', 'Jalan Raya Bogor No. 28'),  
    (4, 'billy_supplier', 'password', 'Billy Hendra', '0812345678929', 'Jalan Taman Sari No. 29'),  
    (5, 'citra_supplier', 'password', 'Citra Widjaja', '0812345678930', 'Jalan Cibadak No. 30'),  
    (6, 'denny_supplier', 'password', 'Denny Santoso', '0812345678931', 'Jalan Raya Pasar Minggu No. 31'),  
    (7, 'evi_supplier', 'password', 'Evi Nugraha', '0812345678932', 'Jalan Pancoran No. 32'),  
    (8, 'fahri_supplier', 'password', 'Fahri Gunawan', '0812345678933', 'Jalan Raya Cikarang No. 33'),  
    (9, 'gina_supplier', 'password', 'Gina Ardelia', '0812345678934', 'Jalan Mayjen Sutoyo No. 34'),  
    (10, 'hendra_supplier', 'password', 'Hendra Sari', '0812345678935', 'Jalan Basuki Rahmat No. 35'),  
    (11, 'indra_supplier', 'password', 'Indra Santoso', '0812345678936', 'Jalan Raya Bekasi No. 36')  
      
    -- Menambahkan data ke tabel Pembelian  
    INSERT INTO Pembelian (IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier)  
    VALUES  
    (1, 12, 6500000.00, 6, 1, 1),  
    (2, 23, 180000.00, 6, 2, 2),  
    (3, 35, 120000.00, 6, 3, 3),  
    (4, 21, 950000.00, 6, 4, 4),  
    (5, 12, 1600000.00, 6, 5, 5),  
    (6, 30, 120000.00, 6, 6, 6),  
    (7, 41, 450000.00, 6, 7, 7),  
    (8, 51, 780000.00, 6, 8, 8),  
    (9, 22, 300000.00, 6, 9, 9),  
    (10, 33, 70000.00, 6, 10, 10),  
    (11, 31, 250000.00, 6, 11, 11),  
    (12, 41, 900000.00, 6, 12, 1),  
    (13, 44, 100000.00, 6, 13, 2),  
    (14, 51, 150000.00, 6, 14, 3),  
    (15, 32, 400000.00, 6, 15, 4);  
      
    -- Menambahkan data ke tabel Penjualan  
    INSERT INTO Penjualan (IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan)  
    VALUES  
    (1, 9, 7500000.00, 7, 1, 1),  
    (2, 18, 200000.00, 7, 2, 2),  
    (3, 27, 150000.00, 7, 3, 3),  
    (4, 23, 1000000.00, 7, 4, 4),  
    (5, 10, 1800000.00, 7, 5, 5),  
    (6, 25, 150000.00, 7, 6, 6),  
    (7, 37, 460000.00, 7, 7, 7),  
    (8, 48, 800000.00, 7, 8, 8),  
    (9, 16, 370000.00, 7, 9, 9),  
    (10, 31, 90000.00, 7, 10, 10),  
    (11, 26, 270000.00, 7, 11, 11),  
    (12, 36, 1000000.00, 7, 12, 1),  
    (13, 40, 200000.00, 7, 13, 2),  
    (14, 45, 180000.00, 7, 14, 3),  
    (15, 25, 420000.00, 7, 15, 4);  
      
    CREATE TABLE cogs_barang (  
      IdCogsBarang INT AUTO_INCREMENT PRIMARY KEY,  
      IdBarang INT,  
      cogs FLOAT,  
     constraint cogs_barang_barang_IdBarang_fk  
          foreign key (IdBarang) references barang (IdBarang)  
    );  
      
    INSERT INTO cogs_barang(IdBarang, cogs)  
    select IdBarang, sum(HargaBeli) / count(distinct IdPembelian) as cogs  
    from sip.pembelian  
    group by IdBarang;
  
 **Penyesuaian Koneksi Database pada file utils/database.php**

    ....
    private $server = "localhost";
    private $username = "root";
    private $password = ""; # default = "" (empty)
    private $database = "db_tk3rev";
    private $port = 8111; # default = 3306
    ...
Pada bagian kode di atas dapat disesuaikan sesuai pengaturan database pada komputer lokal masing-masing.

**Finally, Voila !**
**Repository ini adalah bentuk pemenuhan TK-4 dengan pembangunan aplikasi CRUD dari class-class yang dipersyaratkan**

**Oleh Kelompok 2**
- Leo Tunggul Jesse - 2602269424
- Sarah Dhiena Fadhila - 2602269462
- Taufiq Mahendra - 2602269531
- Unggul Ammarramyaji Nuswantoro - 2602269361
- Yusuf Dwenva Gulo – 2602269506

**Penyiapan database awal untuk mengoperasikan aplikasi**
Query untuk penyiapan databasenya dapat diambil juga dari tugas TK3 pada minggu sebelumnya. Querynya adalah sebagai berikut

    CREATE SCHEMA db_tk3rev;
      
    CREATE TABLE HakAkses (  
      IdAkses INT PRIMARY KEY,  
      NamaAkses VARCHAR(50),  
      Keterangan VARCHAR(100)  
    );  
      
    CREATE TABLE Pengguna (  
      IdPengguna INT PRIMARY KEY,  
      NamaPengguna VARCHAR(50),  
      Password VARCHAR(50),  
      NamaDepan VARCHAR(50),  
      NamaBelakang VARCHAR(50),  
      NoHP VARCHAR(20),  
      Alamat VARCHAR(100),  
      IdAkses INT,  
     FOREIGN KEY (IdAkses) REFERENCES HakAkses(IdAkses)  
    );  
      
    CREATE TABLE Barang (  
      IdBarang INT PRIMARY KEY,  
      NamaBarang VARCHAR(50),  
      Keterangan VARCHAR(100),  
      Satuan VARCHAR(20),  
      IdPengguna INT,  
     FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna)  
    );  
      
    CREATE TABLE Pembelian (  
      IdPembelian INT PRIMARY KEY,  
      JumlahPembelian INT,  
      HargaBeli DECIMAL(10,2),  
      IdPengguna INT,  
      IdBarang INT,  
     FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna),  
     FOREIGN KEY (IdBarang) REFERENCES Barang(IdBarang)  
    );  
      
    CREATE TABLE Penjualan (  
      IdPenjualan INT PRIMARY KEY,  
      JumlahPenjualan INT,  
      HargaJual DECIMAL(10,2),  
      IdPengguna INT,  
      IdBarang INT,  
     FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna),  
     FOREIGN KEY (IdBarang) REFERENCES Barang(IdBarang)  
    );  
      
    INSERT INTO HakAkses (IdAkses, NamaAkses, Keterangan) VALUES  
    (1, 'Direktur', 'Pemimpin tertinggi perusahaan'),  
    (2, 'Admin', 'Admin perusahaan'),  
    (3, 'Help Desk', 'Pemberi bantuan dan informasi internal organisasi'),  
    (4, 'Customer Service', 'Pemberi bantuan dan arahan kepada pelanggan'),  
    (5, 'Departemen Gudang', 'Pengontrol persediaan barang'),  
    (6, 'Departemen Pembelian', 'Pengadaan dan pengelolaan material'),  
    (7, 'Departemen Penjualan', 'Penjualan dan pemasaran produk');  
      
    -- Menambahkan data pada tabel Pengguna  
    INSERT INTO Pengguna (IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHP, Alamat, IdAkses) VALUES  
    -- Direktur  
    (1, 'aldi_direktur', 'password', 'Aldi', 'Setiawan', '0812345678901', 'Jalan Sudirman No. 1', 1),  
      
    -- Admin  
    (2, 'budi_admin', 'password', 'Budi', 'Santoso', '0812345678902', 'Jalan Thamrin No. 2', 2),  
      
    -- Help Desk  
    (3, 'candra_help', 'password', 'Candra', 'Wijaya', '0812345678903', 'Jalan Kebon Jeruk No. 3', 3),  
      
    -- Customer Service  
    (4, 'lila_cs', 'password', 'Lila', 'Amalia', '081234555333', 'Jalan Kelapa Sawit No. 6', 4),  
      
    -- Departemen Gudang  
    (5, 'joni_gudang', 'password', 'Joni', 'Kecil', '081234123456', 'Jalan Griya Megah No. 2', 5),  
      
    -- Departemen Pembelian  
    (6, 'susi_beli', 'password', 'Susi', 'Susanti', '081234654321', 'Jalan Kemanggisan No. 1', 6),  
      
    -- Departemen Penjualan  
    (7, 'dudu_jual', 'password', 'Adudu', 'Santoso', '081234999321', 'Jalan Beo No. 5', 7);  
      
    -- Menambahkan data pada tabel Barang  
    -- *Catatan: IdPengguna yang dimaksud adalah staf gudang yang melakukan submit data stok barang  
    INSERT INTO Barang (IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna)  
    VALUES  
      (1, 'Laptop Asus X512DA', 'Laptop dengan prosesor AMD Ryzen 3 dan RAM 4GB', 'unit', 5),  
      (2, 'Mouse Logitech M221', 'Mouse wireless dengan sensor optikal dan DPI 1000', 'unit', 5),  
      (3, 'Keyboard Logitech K120', 'Keyboard USB dengan tombol empuk dan tahan banting', 'unit', 5),  
      (4, 'Monitor LG 24MK400H', 'Monitor LED 24 inci dengan resolusi 1366 x 768', 'unit', 5),  
      (5, 'Hard Disk Eksternal Toshiba Canvio Basic', 'Hard disk eksternal USB 3.0 dengan kapasitas 1TB', 'unit', 5),  
      (6, 'Flashdisk Sandisk Cruzer Blade', 'Flashdisk USB 2.0 dengan kapasitas 16GB', 'unit', 5),  
      (7, 'Webcam Logitech C270', 'Webcam dengan resolusi 720p dan built-in microphone', 'unit', 5),  
      (8, 'Printer HP Deskjet 2676', 'Printer all-in-one dengan WiFi dan fitur scan dan copy', 'unit', 5),  
      (9, 'Speaker Edifier R12U', 'Speaker USB dengan output suara yang jernih dan bass yang memukau', 'pasang', 5),  
      (10, 'Kabel HDMI 2.0', 'Kabel HDMI dengan panjang 1 meter dan support 4K', 'buah', 5),  
      (11, 'Router TP-Link TL-WR840N', 'Router WiFi dengan kecepatan 300 Mbps dan 2 antena', 'unit', 5),  
      (12, 'Modem Huawei E5577C', 'Modem 4G LTE dengan baterai yang tahan lama dan support 10 device', 'unit', 5),  
      (13, 'Headset Logitech H111', 'Headset dengan jack 3.5mm dan mikrofon noise-cancelling', 'unit', 5),  
      (14, 'Tinta Printer Canon PG-740', 'Tinta printer hitam untuk printer Canon', 'botol', 5),  
      (15, 'Stabilizer Matsunichi MC-500', 'Stabilizer untuk melindungi peralatan elektronik dari gangguan listrik', 'unit', 5),  
      (16, 'Battery Duracell AA', 'Battery AA alkaline dengan daya tahan yang lama', 'pak', 5),  
      (17, 'Cable Ties Kabelindo CT-8', 'Kabel ties dengan panjang 200mm dan lebar 3mm', 'pak', 5),  
      (18, 'Tool Kit 25 in 1', 'Set alat bongkar pasang peralatan elektronik dengan 25 jenis kepala obeng', 'unit', 5),  
      (19, 'Cooling Fan Arctic F8', 'Kipas pendingin dengan ukuran 80mm dan RPM 2000', 'unit', 5),  
      (20, 'Thermal Paste Noctua NT-H1', 'Pasta termal dengan kualitas premium untuk memperbaiki kinerja pendingin', 'unit', 5);  
      
    -- Menambahkan tabel Supplier  
    CREATE TABLE Supplier (  
      IdSupplier INT PRIMARY KEY,  
      Username VARCHAR(50),  
      Password VARCHAR(50),  
      NamaSupplier VARCHAR(50),  
      NoHP VARCHAR(20),  
      AlamatSupplier VARCHAR(100)  
    );  
      
    -- Menambahkan tabel Pelanggan  
    CREATE TABLE Pelanggan (  
      IdPelanggan INT PRIMARY KEY,  
      Username VARCHAR(50),  
      Password VARCHAR(50),  
      NamaPelanggan VARCHAR(50),  
      NoHP VARCHAR(20),  
      AlamatPelanggan VARCHAR(100)  
    );  
      
    -- Menambahkan foreign key IdSupplier pada tabel Pembelian  
    ALTER TABLE Pembelian ADD IdSupplier INT;  
    ALTER TABLE Pembelian ADD FOREIGN KEY (IdSupplier) REFERENCES Supplier(IdSupplier);  
      
    -- Menambahkan foreign key IdPelanggan pada tabel Penjualan  
    ALTER TABLE Penjualan ADD IdPelanggan INT;  
    ALTER TABLE Penjualan ADD FOREIGN KEY (IdPelanggan) REFERENCES Pelanggan(IdPelanggan);  
      
    -- Menambahkan data ke tabel Pelanggan  
    INSERT INTO Pelanggan (IdPelanggan, Username, Password, NamaPelanggan, NoHP, AlamatPelanggan)  
    VALUES  
    (1, 'dodi_pelanggan', 'password', 'Dodi Saputra', '0812345678904', 'Jalan Wahid Hasyim No. 4'),  
    (2, 'eka_pelanggan', 'password', 'Eka Hartono', '0812345678905', 'Jalan Pemuda No. 5'),  
    (3, 'fajar_pelanggan', 'password', 'Fajar Saputra', '0812345678906', 'Jalan Veteran No. 6'),  
    (4, 'gina_pelanggan', 'password', 'Gina Pratiwi', '0812345678907', 'Jalan Merdeka No. 7'),  
    (5, 'hendra_pelanggan', 'password', 'Hendra Gunawan', '0812345678908', 'Jalan Asia Afrika No. 8'),  
    (6, 'inda_pelanggan', 'password', 'Inda Ardelia', '0812345678909', 'Jalan Gatot Subroto No. 9'),  
    (7, 'joni_pelanggan', 'password', 'Joni Santoso', '0812345678910', 'Jalan Sudirman No. 10'),  
    (8, 'kiki_pelanggan', 'password', 'Kiki Saputra', '0812345678911', 'Jalan Ahmad Yani No. 11'),  
    (9, 'lina_pelanggan', 'password', 'Lina Nugraha', '0812345678912', 'Jalan Jenderal Sudirman No. 12'),  
    (10, 'maya_pelanggan', 'password', 'Maya Sari', '0812345678913', 'Jalan Diponegoro No. 13'),  
    (11, 'nina_pelanggan', 'password', 'Nina Santoso', '0812345678914', 'Jalan Cik Ditiro No. 14');  
      
    -- Menambahkan data ke tabel Supplier  
    INSERT INTO Supplier (IdSupplier, Username, Password, NamaSupplier, NoHP, AlamatSupplier)  
    VALUES  
    (1, 'yoga_supplier', 'password', 'Yoga Wijaya', '0812345678926', 'Jalan Sisingamangaraja No. 26'),  
    (2, 'zara_supplier', 'password', 'Zara Lim', '0812345678927', 'Jalan Jend. A. Yani No. 27'),  
    (3, 'anna_supplier', 'password', 'Anna Tan', '0812345678928', 'Jalan Raya Bogor No. 28'),  
    (4, 'billy_supplier', 'password', 'Billy Hendra', '0812345678929', 'Jalan Taman Sari No. 29'),  
    (5, 'citra_supplier', 'password', 'Citra Widjaja', '0812345678930', 'Jalan Cibadak No. 30'),  
    (6, 'denny_supplier', 'password', 'Denny Santoso', '0812345678931', 'Jalan Raya Pasar Minggu No. 31'),  
    (7, 'evi_supplier', 'password', 'Evi Nugraha', '0812345678932', 'Jalan Pancoran No. 32'),  
    (8, 'fahri_supplier', 'password', 'Fahri Gunawan', '0812345678933', 'Jalan Raya Cikarang No. 33'),  
    (9, 'gina_supplier', 'password', 'Gina Ardelia', '0812345678934', 'Jalan Mayjen Sutoyo No. 34'),  
    (10, 'hendra_supplier', 'password', 'Hendra Sari', '0812345678935', 'Jalan Basuki Rahmat No. 35'),  
    (11, 'indra_supplier', 'password', 'Indra Santoso', '0812345678936', 'Jalan Raya Bekasi No. 36')  
      
    -- Menambahkan data ke tabel Pembelian  
    INSERT INTO Pembelian (IdPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier)  
    VALUES  
    (1, 12, 6500000.00, 6, 1, 1),  
    (2, 23, 180000.00, 6, 2, 2),  
    (3, 35, 120000.00, 6, 3, 3),  
    (4, 21, 950000.00, 6, 4, 4),  
    (5, 12, 1600000.00, 6, 5, 5),  
    (6, 30, 120000.00, 6, 6, 6),  
    (7, 41, 450000.00, 6, 7, 7),  
    (8, 51, 780000.00, 6, 8, 8),  
    (9, 22, 300000.00, 6, 9, 9),  
    (10, 33, 70000.00, 6, 10, 10),  
    (11, 31, 250000.00, 6, 11, 11),  
    (12, 41, 900000.00, 6, 12, 1),  
    (13, 44, 100000.00, 6, 13, 2),  
    (14, 51, 150000.00, 6, 14, 3),  
    (15, 32, 400000.00, 6, 15, 4);  
      
    -- Menambahkan data ke tabel Penjualan  
    INSERT INTO Penjualan (IdPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan)  
    VALUES  
    (1, 9, 7500000.00, 7, 1, 1),  
    (2, 18, 200000.00, 7, 2, 2),  
    (3, 27, 150000.00, 7, 3, 3),  
    (4, 23, 1000000.00, 7, 4, 4),  
    (5, 10, 1800000.00, 7, 5, 5),  
    (6, 25, 150000.00, 7, 6, 6),  
    (7, 37, 460000.00, 7, 7, 7),  
    (8, 48, 800000.00, 7, 8, 8),  
    (9, 16, 370000.00, 7, 9, 9),  
    (10, 31, 90000.00, 7, 10, 10),  
    (11, 26, 270000.00, 7, 11, 11),  
    (12, 36, 1000000.00, 7, 12, 1),  
    (13, 40, 200000.00, 7, 13, 2),  
    (14, 45, 180000.00, 7, 14, 3),  
    (15, 25, 420000.00, 7, 15, 4);  
      
    CREATE TABLE cogs_barang (  
      IdCogsBarang INT AUTO_INCREMENT PRIMARY KEY,  
      IdBarang INT,  
      cogs FLOAT,  
     constraint cogs_barang_barang_IdBarang_fk  
          foreign key (IdBarang) references barang (IdBarang)  
    );  
      
    INSERT INTO cogs_barang(IdBarang, cogs)  
    select IdBarang, sum(HargaBeli) / count(distinct IdPembelian) as cogs  
    from sip.pembelian  
    group by IdBarang;
  
 **Penyesuaian Koneksi Database pada file utils/database.php**

    ....
    private $server = "localhost";
    private $username = "root";
    private $password = ""; # default = "" (empty)
    private $database = "db_tk3rev";
    private $port = 8111; # default = 3306
    ...
Pada bagian kode di atas dapat disesuaikan sesuai pengaturan database pada komputer lokal masing-masing.

**Finally, Voila !**


