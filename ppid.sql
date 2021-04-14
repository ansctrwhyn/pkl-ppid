-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2020 pada 04.51
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`, `email`) VALUES
(1, 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'pkl.ppidwonogiri@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `isi` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `date_created` int(128) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `image`, `date_created`, `views`) VALUES
(1, 'Bukan Nusakambangan, Tersangka Kasus Narkoba Di Wonogiri Dapat Sabu Dari Semarang', '<p style=\"text-align:justify\"><strong>Wonogiri</strong>&nbsp;-&nbsp;Anggota Resnarkoba Polres Wonogiri menemukan fakta baru terkait pengungkapan pengedaran narkoba di wilayah Kabupaten Wonogiri beberapa waktu lalu. Hasil pengakuan salah satu tersangka, Haryadi alias Acong, 43, terkait barang atau narkotika jenis sabu yang ia dapatkan dari salah satu narapidana di Lembaga Pemasyarakatan Nusakambangan dinyatakan salah. Fakta tersebut diungkapkan oleh Kasat Resnarkoba Polres Wonogiri, AKP Suharjo, saat ditemui wartawan di ruang kerjanya, Senin (15/6/2020).</p>\r\n\r\n<p style=\"text-align:justify\">AKP Suharjo mengatakan pihaknya telah bekerjasama dengan Rumah Tahanan Wonogiri untuk proses penyidikan terkait pengakuan tersangka. &quot;Setelah dihubungkan atau koordinasi antara Rutan Wonogiri dengan Lapas Nusakambangan, tidak ditemukan napi berinisial A yang dimaksudkan Acong,&quot; katanya, Senin (15/6/2020).</p>\r\n\r\n<p style=\"text-align:justify\">Teman Tersangka Berdasarkan penyidikan saat ini, dimungkinkan saat ini A berada di Semarang. Tetapi belum dapat dipastikan apakah di Lapas atau tidak. A merupakan teman Acong ketika menjalani hukuman kasus serupa di Lapas Solo. Langkah selanjutnya, aparat Polres Wonogiri akan mengubah Berita Acara Pemeriksaan (BAP). Hal itu karena adanya fakta baru. BAP yang ditulis sesuai dengan fakta akan mempermudah proses selanjutnya. &quot;Apa yang diungkapkan tersangka kami tulis. Memang ada potensi ia berbohong, tetapi tugas kami mencari fakta yang sesungguhnya. Seperti yang terjadi pada kasus ini. Kami tidak bisa menekan tersangka dengan kekerasan agar mengaku dengan sejujurnya,&quot; ujar dia.</p>\r\n\r\n<p style=\"text-align:justify\">Lebih lanjut, AKP Suharjo berharap kasus narkoba ini segera terbongkar. Sehingga proses atau tahapan selanjutnya bisa segera dilalui. Diberitakan sebelumnya, Acong merupakan residivis kasus narkoba yang kembali ditangkap aparat Polres Wonogiri pada Kamis, 11 Juni 2020. Polisi berhasil mengungkap Acong berdasarkan pengakuan tersangka yang membeli narkotika kepada dirinya.</p>\r\n', '1.jpg', 1592754328, 18),
(2, 'Pemkab Wonogiri Belum Berani Buka Alun-Alun, PKL Tak Boleh Jualan', '<p style=\"text-align:justify\"><strong>Wonogiri</strong>&nbsp;-&nbsp;Pemerintah Kabupaten Wonogiri belum berani membuka kawasan Alun-Alun Giri Krida Bakti untuk berjualan Pedagang Kaki Lima (PKL) pada malam hari. Pasalnya, kawasan alun-alun merupakan pusat keramaian di kawasan perkotaan Wonogiri pada malam hari. Jika dibuka dan PKL diperkenankan untuk berjualan, dikhawatirkan terjadi kerumunan masyarakat dan protokol kesehatan tidak terpenuhi.</p>\r\n\r\n<p style=\"text-align:justify\">Bupati Wonogiri, Joko Sutopo (Jekek), menyatakan belum dapat dipasatikan kapan kawasan alun-alun dibuka kembali. Sebagai bahan pertimbangan, pemkab akan memantau perkembangan Covid-19 di Wonogiri sebagai acuan alun-alun bisa dibuka kembali. &ldquo;Saat ini ada istilah orang tanpa gejala [OTG]. Tidak ada yang tau siapa yang terjangkit saat berkerumun.</p>\r\n\r\n<p style=\"text-align:justify\">Selama ini kan alun-alun dipadati masyarakat, terlebih jika PKL ada yang berdagang. Maka kebijakan kami untuk belum membuka alun-alun sebagai upaya kewaspadaan,&rdquo; kata dia kepada Solopos.com di pendapa Rumah Dinas Bupati Wonogiri, Senin (15/6/2020). Ia mengatakan, keberadaan PKL di kawasan alun-alun berbeda dengan PKL di tempat lain. Di kawasan lain jarak antar pedagang bisa diatur. Sedangkan di kawasan alun-alun, jarak antar PKL sulit diatur. Karena kawasannya terbatas sedangkan penjualnya banyak. &ldquo;Tujuan kebijakan kami tidak melemahkan ekonomi rakyat, tetapi sebagai wujud kewaspadaan agar penularan Covid-19 tidak meluas,&rdquo; kata Jekek.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Jualan di Area Lain </strong></p>\r\n\r\n<p style=\"text-align:justify\">Sebelumnya, Pemkab Wonogiri memberi kebebasan PKL untuk berjualan di kawasan Kantor Pertanahan Wonogiri ke arah timur atau sekitar kawasan selter bus. Ketua Paguyuban PKL alun-alun Wonogiri, Supriono, mengatakan selama pandemi sebagain PKL sudah mencoba berjualan di area yang diperbolehkan. Tetapi sebagian besar sepi pembeli. Sehingga para pedagang memilih untuk berhenti jualan. &ldquo;Jika tetap berjualan justru tambah rugi,&rdquo; kata dia saat dihubungi belum lama ini.</p>\r\n', '2.jpg', 1592755667, 2),
(3, 'Jumlah Ibu Hamil Melonjak Di Wonogiri, Naik 3.000-An Sebulan', '<p style=\"text-align:justify\"><strong>Wonogiri</strong>&nbsp;-&nbsp;Jumlah ibu hamil di Kabupaten Wonogiri melonjak drastis setelah diumunkan masa anjuran stay at home atau berada di rumah bagi masyarakat sejak Maret 2020 lalu. Hal ini sejalan dengan tren kenaikan kehamilan di beberapa daerah di Soloraya pada bulan-bulan yang sama. Kepala Dinas Kesehatan (Dinkes) Wonogiri, Adhi Dharma, menyampaikan angka kehamilan baru pada April naik cukup signifikan dibanding bulan sebelumnya. Adhi mencatat kehamilan baru Januari-April sebanyak 5.103 orang.</p>\r\n\r\n<p style=\"text-align:justify\">Sebelum Covid-19 mewabah, yakni Januari-Maret tercatat ada 2.041 ibu hamil di Wonogiri. Berarti jumlah ibu hamil di Wonogiri pada masa pandemi April naik signifikan sebanyak 3.062 orang. Jumlah tersebut melonjak jauh lebih tinggi dari pada kehamilan tiga bulan sebelumnya. Sedangkan data kehamilan baru selama pandemi Mei belum masuk masuk Dinkes. Meski demikian, dia menganggap jumlah ibu hamil yang naik di Wonogiri tersebut tidak sepenuhnya karena warga di rumah selama wabah Covid-19. Dia menyebut perlu penelitian lebih lanjut untuk menyebut kebijakan stay at home pada masa pandemi berdampak pada naiknya kehamilan baru.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>KB Mandek</strong></p>\r\n\r\n<p style=\"text-align:justify\">Kehamilan baru bisa jadi akibat program KB pada perempuan terhenti lantaran layanan KB saat pandemi terbatas. Dia mencontohkan, ada seorang perempuan menjalankan program KB suntik. Saat pandemi layanan KB suntik dihentikan sementara, sehingga perempuan tersebut tak KB. Intinya, dia menampik kesimpulan bahwa angka kehamilan di Wonogiri naik akibat anjuran stay at home. &ldquo;Berada di rumah selama pandemi memang berkontribusi terhadap naiknya angka kehamilan baru. Tapi kehamilan baru tak sepenuhnya akibat faktor itu. Jadi, tak bisa digeneralisasi pandemi membuat banyak perempuan hamil,&rdquo; kata dia saat ditemui di kantornya, Jumat.</p>\r\n\r\n<p style=\"text-align:justify\">Tak hanya di Wonogiri, jumlah ibu hamil di Klaten terus naik dalam beberapa bulan terakhir. Banyaknya ibu hamil di Kabupaten Bersinar itu tak terlepas dari kebijakan stay at home selama pandemi Covid-19 sehingga suami dan istri lebih sering berkumpul di rumah. Berdasarkan data yang dihimpun Solopos.com, angka ibu hamil di Klaten terus meningkat dalam beberapa bulan terakhir. Angka ibu hamil pada Maret 2020 mencapai 1.299 orang. Jumlah itu terus meningkat pada April 2020, yakni mencapai 1.333 orang.</p>\r\n', '3.jpg', 1592756270, 8),
(4, 'Nekat Bawa 13 Pelayat, Mobil Pikap Kecelakaan Di Pracimantoro Wonogiri', '<p style=\"text-align:justify\"><strong>Wonogiri</strong>&nbsp;-&nbsp;Sebanyak 13 warga Joho, Pracimantoro, Wonogiri, luka-luka akibat mobil pikap yang mereka tumpangi kecelakaan. Pikap tergelincir hingga jatuh miring di jembatan Selorejo, Sirnoboyo, Giriwoyo Wonogiri, Sabtu (20/6/2020) pukul 18.00 WIB. Saat itu mereka hendak melayat ke Baturetno melalui jalur lingkar selatan (JLS) Pracimantoro-Giriwoyo.</p>\r\n\r\n<p style=\"text-align:justify\">Anggota komunitas sepeda motor yang ikut menolong para korban, Pius Ardhika Yoga Wardana, 20, kepada Solopos.com, Minggu (21/6/2020), mengatakan para korban mengalami luka setelah terpental saat mobil pikap Mitsubishi T120SS berpelat nomor AD 1797 PI yang mereka tumpangi jatuh miring ke kiri di badan jalan. Mayoritas penumpang laki-laki yang berusia paruh baya. Warga secara spontan menolong. Ada yang membantu mengevakuasi para korban lalu membawa ke RS Maguan Husada, Pracimantoro. Ada pula yang mengatur lalu lintas karena mobil pikap tersebut menghalangi jalan. &ldquo;Saat itu petang hari, penerangan minim.</p>\r\n\r\n<p style=\"text-align:justify\">Lalu lintas sempat tersendat saat mobil yang kecelakaan itu belum bisa dievakuasi. Setelah warga berhasil mengevakuasi mobil, lalu lintas kembali lancar,&rdquo; kata warga Selorejo itu saat dihubungi. Kepala Unit Kecelakaan (Kanitlaka) Satuan Lalu Lintas (Satlantas) Polres Wonogiri, Ipda Broto Suwarno, Minggu, mengonfirmasi adanya kecalakaan lalu lintas (lakalantas) tersebut. Mobil pikap itu kecelakaan tunggal.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Kronologi Kecelakaan Mobil Pikap di Pracimantoro Wonogiri </strong></p>\r\n\r\n<p style=\"text-align:justify\">Awalnya, mobil yang dikemudikan Giyanto mengangkut 11 orang dari arah Pracimantoro. Sebelum 500 meter dari lokasi kejadian sopir menghentikan mobil karena posisinya diganti Kamto, kerabat yang duduk disebelahnya. Saat itu Giyanto merasa capai. Setelah melintas di jalan menikung dan menurun, Kamto tak bisa mengendalikan laju mobil sehingga oleng.</p>\r\n\r\n<p style=\"text-align:justify\">Sesampainya di jembatan mobil tergelincir sampai akhirnya jatuh miring ke kiri. Para penumpang di bak pun terpental. &ldquo;Semua penumpang termasuk sopir selamat. Totalnya ada 13 penumpang. Saat itu lima penumpang luka lecet, sehingga tak dilarikan ke RS. Tujuh penumpang lainnya dilarikan ke RS Maguan Husada. Lima orang diperbolehkan pulang karena hanya luka ringan, dua orang lainnya dirawat inap karena masih mengeluhkan sakit,&rdquo; kata Broto mewakili Kasatlantas Polres Wonogiri, AKP Hendrie Suryo Liquisasono. Dia melanjutkan para penumpang merupakan warga Joho, Pracimantoro yang akan melayat ke Baturetno. Mereka sudah berusia lebih dari 50 tahun, tetapi syukur tidak ada yang mengalami luka sangat serius.</p>\r\n\r\n<p style=\"text-align:justify\">Broto menegaskan mobil pikap bukan untuk mengangkut orang, tetapi barang. Mengangkut orang di bak terbuka sangat berbahaya. Penumpang bisa terjatuh, terlebih saat mobil oleng. Dia mengaku intensif memberi imbauan kepada warga agar tak mengangkut orang dengan mobil pikap. Bahkan, polisi cukup sering menilang sopir mobil pikap yang mengangkut orang. &ldquo;Kalau mendapati mobil pikap mengangkut orang, kami minta para penumpang turun. Kami tak mengizinkan penumpang diangkut lagi sebelum sopir mengganti mobil dengan minibus misalnya. Ini jelas pelanggaran, ya kami tilang,&rdquo; imbuh Broto.</p>\r\n', '4.jpeg', 1592756799, 9),
(5, 'Penjualan Turun 50%, Ini Yang Dilakukan Petani Ikan Wonogiri', '<p style=\"text-align:justify\"><strong>Wonogiri</strong>&nbsp;-&nbsp;Petani ikan di Wonogiri menyiasati penurunan permintaan pasar akibat Covid-19, dengan mengubah pola penjualan. Kini mereka menjual ke pengecer secara online. Sebelumnya, mereka hanya menjual kepada pengepul.</p>\r\n\r\n<p style=\"text-align:justify\">Ketua Paguyuban Nila Kencana, Sugiyanto, saat ditemui Solopos.com di kawasan kota Wonogiri, Rabu (10/6/2020), menyampaikan para petani ikan sekuat tenaga mempertahankan usaha di tengah wabah Covid-19, meski penjualan menurun signifikan. Menurut dia penjualan ikan turun hingga 50 persen. Saat normal, 20 petani ikan anggota Paguyuban Nila Kencana dapat menjual 1 ton/hari ke DIY dan Wonogiri. Pada masa pandemi Covid-19 ini penjualan harian hanya separuhnya. &ldquo;Pasar terbesar kami di DIY. Kami menjual ke pengepul yang selanjutnya ikan dijual kepada pemilik warung makan.</p>\r\n\r\n<p style=\"text-align:justify\">Sekarang ini kampus-kampus tutup, sehingga mahasiswa banyak yang pulang ke rumah masing-masing. Akibatnya, penjualan di warung makan turun. Bahkan, tak sedikit warung yang tutup sementara. Jadi, order ikan pun turut menurun,&rdquo; kata lelaki yang akrab disapa Sugi itu. Kondisi itu membuat para petani ikan mengurangi produksi atau jumlah populasi ikan.</p>\r\n\r\n<p style=\"text-align:justify\">Dia mencontohkan, biasanya dalam satu petak karamba diisi 2.000 ekor ikan. Pada masa wabah ini petani hanya mengisi tiap petak karamba separuh dari populasi biasanya. Jika populasi ikan tak dikurangi, sementara permintaan pasar menurun, petani bisa rugi karena biaya produksi membengkak. Biaya produksi tersebut untuk pengadaan bibit, pakan, dan upah pekerja. Jika hal itu terjadi stok ikan bakal berlebih. &ldquo;Usaha kami bisa bertahan di masa sulit sekarang ini sudah bersyukur. Pendapatan minim enggak masalah, yang penting usaha tetap bisa berjalan,&rdquo; imbuh Sugi.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Jualan Online </strong></p>\r\n\r\n<p style=\"text-align:justify\">Kondisi ini memaksa petani ikan memutar otak. Mereka mengubah pola penjualan. Sebelumnya para petani ikan hanya menjual kepada pengepul. Namun, saat ini mereka juga melayani order dari pengecer yang menjual ikan secara online. Kini banyak pengecer beralih menjual ikan secara online lantaran perilaku konsumen berubah. Konsumen ingin membeli ikan tetapi tak ingin keluar rumah agar tak tertular Covid-19.</p>\r\n\r\n<p style=\"text-align:justify\">Selain menjual kepada pengecer online, petani menjual ke beberapa pengepul di beberapa wilayah. &ldquo;Biasanya kami menjual kepada satu pengepul. Sekarang ke beberapa pengepul,&rdquo; ucap dia. Siasat penjualan itu cukup efektif untuk meningkatkan penjualan. Sugi menyebut sejak beberapa pekan penjualan berangsur meningkat. Namun, harga jual ikan masih belum normal. Sebelum pandemi harga jual ikan dari karamba Rp25.000/kg, kini turun menjadi Rp23.000/kg.</p>\r\n', '5.jpeg', 1592757096, 5),
(6, 'Keren, Seniman Bikin Lagu Kisahkan Keindahan Waduk Pidekso Wonogiri', '<p style=\"text-align:justify\"><strong>Wonogiri</strong> - Seniman musik asal Kecamatan Baturetno, Wonogiri, yang tergabung dalam grup band R.F.P membuat sebuah lagu untuk mengapresiasi pembangunan Waduk Pidekso. Lagu berjudul Pidekso Seksine Katresnan tersebut diluncurkan melalui channel Youtube R.F.P. Band sejak 13 Juni 2020 dengan durasi 4 menit 52 detik. Hingga Rabu (17/6/2020) pukul 15.00 WIB, video tersebut sudah ditonton sebanyak 658 kali.</p>\r\n\r\n<p style=\"text-align:justify\">Saat ini di wilayah Baturetno dan sekitarnya, lagu yang klipnya bisa disaksikan di <a href=\"https://youtu.be/Ga9vhgTs8o0\">https://youtu.be/Ga9vhgTs8o0</a> itu sudah banyak dinyanyikan oleh kalangan pemuda. Hal itu diungkapkan oleh salah satu personel grup band R.F.P., Fattah Ibrahim Setiawan, saat dihubungi solopos.com, Rabu. Ia mengatakan, lagu tersebut mengisahkan seorang pasangan kekasih yang mempunyai kenangan di Waduk Pidekso saat menjalani kisah asmaranya. Tetapi kini pasangan kekasih tersebut sudah tidak lagi bersama lantaran sang perempuan pergi ke perantauan. Sang laki-laki merindukan momen atau suasana mesra ketika menikmati keindahan Waduk Pidekso. &quot;Lagu ini dibuat juga untuk menyampaikan sebuah pesan atau gambaran tentang kemegahan Waduk Pidekso,&quot; kata dia.</p>\r\n\r\n<p style=\"text-align:justify\">Pada dasarnya, menurut dia, lagu tersebut sudah diciptakan sejak 2018 dengan aliran musik campursari. Karena lagu tersebut viral di kalangan anak muda di daerah Baturetno Wonogiri, PT PP mendukung agar lagu tersebut bisa dikembangkan secara profesional. Akhirnya, lagu tersebut dibuat video klip dan masuk perekaman. Tetapi personel grup band berinisiatif untuk mengubah aliran musik menjadi rock and roll. Dalam proses perekaman, karyawan PT PP juga dilibatkan. Bahkan dana perekaman didanai oleh PT PP.</p>\r\n\r\n<p style=\"text-align:justify\">Awalnya, grup band hanya beranggotakan tiga orang. Vokalis dan pencipta lagu yakni Ribut, warga Kecamatan Baturetno. Sedangkan gitaris dimainkan oleh Pai. Fattah berperan sebagai aransemen lagu. Karena pemeran drum kosong, akhirnya personel band bersepakat untuk meminta tolong teman dari Solo untuk mengisi kekosongan tersebut. &quot;Jika termasuk kru yang mengambi video, total ada enam orang,&quot; ujar dia.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Bangkitkan Sektor Wisata </strong></p>\r\n\r\n<p style=\"text-align:justify\">Ia mengatakan, proses perekaman dan diunggahnya lagu tersebut di youtube sebagai upaya promosi potensi wisata Waduk Pidekso kedepannya. Dengan adanya Waduk Pidekso, diharapakan bisa membangkitkan sektor pariwisata, perikanan, pertanian sera ekonomi sekitar.</p>\r\n\r\n<p style=\"text-align:justify\">Waduk Pidekso merupakan bagian proyek strategis nasional yang mulai dikerjakan mulai Maret 2018 dan ditargetkan selesai pada 2021. Proses pengerjaan pembangunan dikerjakan oleh PT Pembangunan Perumahan (PP). Akibat pembangunan tersebut ada tiga wilayah desa yang terdampak, yakni Desa Pidekso dan Desa Tukulrejo Kecamatan Giriwoyo serta Desa Sendangsari Kecamatan Batuwarno. &quot;Ini sudah memasuki tahap kedua. Pada 2021 ditargetkan rampung. Faktor cuaca yakni sering hujan menjadi kendala pembangunan, sehingga sedikit terlambat,&quot; kata Fattah.</p>\r\n', '6.jpg', 1592757331, 6),
(9, 'Giliran Karyawan Perusahaan di Wonogiri Jadi Sasaran Rapid Test, Gimana Hasilnya?', '<p style=\"text-align:justify\"><strong>Wonogiri</strong> - Karyawan perusahaan di Wonogiri menjadi prioritas untuk mengikuti rapid test tahap ketiga yang diselenggarakan Gugus Tugas Percepatan Penanganan Covid-19 Wonogiri. Salah satu alasan perusahaan menjadi sasaran rapid test karena menjadi tempat berkumpulnya banyak orang. Rapid test dilaksanakan pada Senin-Rabu (22-24/6/2020).</p>\r\n\r\n<p style=\"text-align:justify\">Kepala Dinas Kesehatan Kabupaten (DKK) Wonogiri, Adhi Dharma, mengatakan tes cepat Covid-19 tersebut dilakukan di lima perusahaan di Wonogiri secara acak. Dalam hal ini, DKK bekerja sama dengan Dinas Tenaga Kerja dan Transmigrasi Wonogiri karena berkaitan langsung dengan perusahaan. Setiap perusahaan mendapatkan kuota 50 alat rapid test. Pada pengadaan ketiga, DKK dan Gugus Tugas Percepatan Penanganan Covid-19 Wonogiri mampu menyediakan 480 alat rapid test Covid-19. Dua ratus lima puluh alat rapid test digunakan untuk karyawan perusahaan di Wonogiri. Sisanya diperuntukkan bagi santri di pondok pesantren dan para pelaku perjalanan moda transportasi.</p>\r\n\r\n<p style=\"text-align:justify\">Bupati Wonogiri, Joko Sutopo yang akrab disapa Jekek, mengatakan pengadaan dan pelaksanaan rapid test akan terus diadakan. Kali ini giliran rapid test menyasar karyawan perusahaan di Wonogiri. &quot;Rapid test akan selalu kami upayakan. Selanjutnya kami akan mencari golongan atau kelompok yang layak untuk menjalani rapid test,&quot; kata dia di ruang kerjanya, Selasa (23/6/2020).</p>\r\n\r\n<p style=\"text-align:justify\">Salah satu tujuan diperbanyaknya alat rapid test Covid-19, menurut dia, untuk mendapatkan data yang bisa dijadikan acuan guna memutuskan kebijakan. Terutama kebijakan yang berkaitan dengan epidemiologi wabah virus corona jenis baru atau Covid-19. Lantas bagaimana hasil rapid test yang menyasar karyawan perusahaan di Wonogiri ini?</p>\r\n\r\n<p style=\"text-align:justify\">Menurut Bupati Jekek, hasil rapid test pada tiga hari tersebut akan diumumkan sesegera mungkin oleh Gugus Tugas Percepatan Penanganan Covid-19 Wonogiri. Sebelumnya, Gugus Tugas Percepatan Penanganan Covid-19 Kabupaten Wonogiri sudah melakukan rapid test Covid-19 massal sebanyak dua kali. Pada tahap pertama rapid test dilakukan di beberapa pasar tradisional dan toko modern di Wonogiri. Sedangkan pada tahap kedua diperuntukkan bagi para pedagang di beberapa pasar hewan di Wonogiri.</p>\r\n', '2306rapid-test-wonogiri.png', 1593273988, 13),
(11, 'Kisah Sedih Sopir Angkuta Wonogiri, Antre 6 Jam Untuk Berangkatkan Penumpang', '<p style=\"text-align:justify\">Solopos.com, WONOGIRI &mdash; Nasib sopir angkuta di Wonogiri sungguh malang. Selama pandemi Covid-19 para sopir angkutan kota (angkuta) itu tidak bisa beroperasi penuh.</p>\r\n\r\n<p style=\"text-align:justify\">Bahkan, untuk mendapatkan penumpang dan memberangkatkan angkutan masing-masing, sopir harus menunggu atau antre sampai 6 jam. Hal itu terpaksa dilakukan menyusul sepinya penumpang.</p>\r\n\r\n<p style=\"text-align:justify\">Salah seorang sopir angkuta Wonogiri, Agung, sudah mengantrekan mobil angkutanya di Terminal Wonogiri Kota Tipe C atau Terminal Angkuta Wonogiri sejak pukul 04.30 WIB. Tetapi, hingga pukul 09.30 WIB ia belum mendapat jatah untuk berangkat.</p>\r\n\r\n<p style=\"text-align:justify\">Dia mendapat giliran berangkat pukul 12.00 WIB. Biasanya pukul 06.30 WIB ia sudah beroperasi untuk mengangkut anak sekolah.</p>\r\n\r\n<p style=\"text-align:justify\">Lamanya waktu antre disebabkan penumpang sopir angkuta Wonogiri sepi. Di tengah kondisi saat ini, Agung merasakan penurunan pendapatan 50% lebih. Dalam situasi normal, dia bisa memperoleh pendapatan kotor Rp150.000-Rp200.000 setiap hari.</p>\r\n\r\n<p style=\"text-align:justify\">Sementara, selama pandemi untuk mendapatkan penghasilan kotor Rp100.000 setiap hari saja susah. Biasanya ia hanya mendapat Rp70.000-Rp80.000 per hari.</p>\r\n\r\n<p style=\"text-align:justify\">Pendapatan Habis untuk Bahan Bakar dan Setoran<br />\r\n&ldquo;Penghasilan tersebut belum termasuk untuk membeli bahan bakar dan setoran. Sampai rumah hampir habis,&rdquo; kata dia saat ditemui Solopos.com di Terminal Angkuta Wonogiri, Selasa (23/6/2020).</p>\r\n\r\n<p style=\"text-align:justify\">Trayek yang dituju Agung yaitu Pasar Kota Wonogiri menuju Pasar Krisak, Kecamatan Selogiri, Wonogiri, dan sebaliknya. Saat ini rata-rata sopir angkuta Wonogiri seperti dirinya hanya mengoperasikan angkuta pulang-pergi (PP) sebanyak satu kali.</p>\r\n\r\n<p style=\"text-align:justify\">Jika masih ada waktu, pada sore hari ia mencoba mengantrekan mobilnya lagi. Membawa satu penumpang dari Krisak menuju Pasar Kota Wonogiri untuk saat ini sudah menjadi biasa karena penumpang sepi.</p>\r\n\r\n<p style=\"text-align:justify\">Anak sekolah di Wonogiri diliburkan memberi dampak yang sangat signifikan terhadap sepinya penumpang sopir angkuta Wonogiri.</p>\r\n\r\n<p style=\"text-align:justify\">Sebenarnya ada dua jenis penumpang yang selama ini menjadi target utama sopir angkuta, yakni anak sekolah dan pedagang serta pengunjung pasar. Tetapi pedagang pasar tidak bisa menjadi acuan karena tidak selalu ada.</p>\r\n\r\n<p style=\"text-align:justify\">Ceda dengan anak sekolah. Waktu berangkat dan pulang sekolah serta jumlahnya sudah pasti. &ldquo;Penumpang angkuta itu saat normal saja kadang ada sepinya terlebih saat pandemi, lebih parah,&rdquo; kata Agung.</p>', '2306angkuta-wonogiri1.png', 1594091826, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_publik`
--

CREATE TABLE `informasi_publik` (
  `id_informasi` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `id_jenis` int(3) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `id_skpd` int(3) NOT NULL,
  `file` varchar(256) NOT NULL,
  `size` varchar(128) NOT NULL,
  `date_upload` int(128) NOT NULL,
  `jumlah_unduh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi_publik`
--

INSERT INTO `informasi_publik` (`id_informasi`, `judul`, `id_jenis`, `id_kategori`, `id_skpd`, `file`, `size`, `date_upload`, `jumlah_unduh`) VALUES
(1, 'Indikator Kinerja Utama Kecamatan Batuwarno 2019', 1, 2, 10, 'IKU_KECAMATAN_BATUWARNO_2019.pdf', '111624', 1592787194, 0),
(3, 'Rencana Strategis OPD Kecamatan Batuwarno Tahun 2016-2021', 1, 1, 10, 'RENSTRA_OPD_KECAMATAN_BATUWARNO_2016-2021.pdf', '0', 1592795076, 0),
(4, 'Rencana Kerja Tahunan Kecamatan Girimarto Tahun 2020', 2, 1, 18, 'RKT_2020_KECAMATAN_GIRIMARTO.pdf', '0', 1592792315, 0),
(5, 'Neraca Saldo SKPD Akhir Kecamatan Giriwoyo 2019', 1, 3, 11, 'NERACA_SALDO_SKPD_AKHIR_GIRIWOYO_2019.pdf', '42042', 1592790321, 0),
(6, 'Pengumuman Seleksi Penerimaan Pendamping Koperasi dan UKM 2020', 2, 11, 47, 'PENGUMUMAN_PENDAMPING_KOPERASI_DAN_UKM_2020.pdf', '981680', 1592792381, 0),
(7, 'Dokumen Pelaksanaan Anggaran Kecamatan Ngadirojo 2018', 2, 3, 3, 'DPA_KECAMATAN_NGADIROJO_2018.pdf', '63917', 1592791521, 0),
(8, 'Rencana Kerja Tahunan Kecamatan Ngadirojo Tahun 2020', 2, 1, 3, 'RKT_KECAMATAN_NGADIROJO_2019-2020.pdf', '0', 1592795015, 0),
(9, 'Rencana Kerja Tahunan Kecamatan Giritontro Tahun 2020', 2, 1, 12, 'RKT_KECAMATAN_GIRITONTRO_2019.pdf', '0', 1592795055, 0),
(10, 'Perjanjian Kinerja Camat Jatisrono 2019', 1, 5, 16, 'PERJANJIAN_KINERJA_CAMAT_JATISRONO_2019.pdf', '1311215', 1592793671, 0),
(11, 'SOP Administrasi Kecamatan Jatipurno 2020', 1, 2, 17, 'SK_SOP_KECAMATAN_JATIPURNO_2020.pdf', '0', 1592795105, 7),
(12, 'Prosedur Pelayanan Permohonan Informasi Publik', 3, 6, 37, 'TATA_CARA_PELAYANAN_PERMOHONAN_INFO_PUBLIK.pdf', '279752', 1592794730, 3),
(13, 'Prosedur Pengajuan Keberatan Informasi Publik', 3, 6, 37, 'TATA_CARA_KEBERATAN_INFORMASI_PUBLIK.pdf', '288266', 1592794771, 0),
(14, 'Prosedur Penyeselaian Sengketa Informasi Publik', 3, 6, 37, 'TATA_CARA_SENGKETA_INFORMASI.pdf', '282320', 1592794804, 0),
(15, 'Keputusan Bersama Tentang Libur Nasional dan Cuti Bersama', 3, 7, 28, 'SK_TENTANG_LIBUR_NASIONAL_DAN_CUTI_BERSAMA_2020.pdf', '1257934', 1592794864, 4),
(17, 'SK Bupati Terkait PSBB', 3, 7, 26, 'SK_BUPATI_TENTANG_PSBB_PENCEGAHAN_COVID19.pdf', '1350699', 1593322266, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_informasi`
--

CREATE TABLE `jenis_informasi` (
  `id_jenis` int(3) NOT NULL,
  `jenis` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_informasi`
--

INSERT INTO `jenis_informasi` (`id_jenis`, `jenis`) VALUES
(1, 'Berkala'),
(2, 'Serta Merta'),
(3, 'Setiap Saat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Program dan Kegiatan'),
(2, 'Informasi Kinerja'),
(3, 'Laporan Keuangan'),
(4, 'Laporan Akses Informasi Publik'),
(5, 'Peraturan dan Perijinan'),
(6, 'Prosedur Akses Informasi Publik'),
(7, 'Regulasi'),
(8, 'Hasil Penelitian'),
(9, 'Profil Badan Publik'),
(10, 'Informasi Darurat'),
(11, 'Pengumuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kotak_saran`
--

CREATE TABLE `kotak_saran` (
  `id_pesan` int(3) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `pesan` varchar(256) NOT NULL,
  `date_created` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kotak_saran`
--

INSERT INTO `kotak_saran` (`id_pesan`, `nama`, `email`, `no_telp`, `pesan`, `date_created`) VALUES
(6, 'Aldi', 'aldi@gmail.com', '089967353245', 'Sukses selalu', 1580654780),
(7, 'Mahmud', 'mahmud@gmail.com', '087847484949', 'Terimakasih', 1580654820),
(21, 'Anisa Catur Wahyuni', 'ansctrwhyn@gmail.com', '081562773633', 'Kenapa informasinya masih sedikit?', 1593272473),
(22, 'Erlina', 'erlina@gmail.com', '08764786885', 'Jika ingin mengajukan keberatan informasi mekanismenya bagaimana ya? Terimakasih.', 1593518556),
(23, 'deanda', 'deanmhft@gmail.com', '08764786884', 'Hallo min', 1593658367);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `image` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_created` int(128) NOT NULL,
  `tipe_member` int(3) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `no_identitas`, `image`, `nama`, `alamat`, `no_telp`, `email`, `password`, `date_created`, `tipe_member`, `is_active`) VALUES
(12, '3323074904990002', '11355.jpg', 'Mahmud', 'Wonogiri', '081516262728', 'milleepark94@gmail.com', '2e3817293fc275dbee74bd71ce6eb056', 1594081326, 1, 1),
(13, '3323074904990001', '113551.jpg', 'Deanda Mahfita', 'Parakan', '081516262724', '504.deandamahfita@gmail.com', '2e3817293fc275dbee74bd71ce6eb056', 1594081511, 1, 1),
(16, '3323084304990002', '11354.jpg', 'Anisa Catur Wahyuni', 'Parakan', '081525263738', 'ansctrwhyn@gmail.com', '2e3817293fc275dbee74bd71ce6eb056', 1594091597, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_type`
--

CREATE TABLE `member_type` (
  `id_type` int(3) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member_type`
--

INSERT INTO `member_type` (`id_type`, `type`) VALUES
(1, 'Individu'),
(2, 'Kelompok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `rincian` varchar(256) NOT NULL,
  `tujuan` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `date_created` int(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id_permohonan`, `nama`, `no_identitas`, `rincian`, `tujuan`, `email`, `date_created`, `status`) VALUES
(19, 'Mahmud', '3323074904990002', 'Data Penduduk di Kecamatan Ngadirojo', 'Bahan skripsi', 'milleepark94@gmail.com', 1594081769, 'Ditolak'),
(20, 'Deanda Mahfita', '3323074904990001', 'Data APBD Tahun 2019', 'Pengawasan', '504.deandamahfita@gmail.com', 1594081856, 'Selesai'),
(21, 'Anisa Catur Wahyuni', '3323084304990002', 'surat layak', 'seminar', 'ansctrwhyn@gmail.com', 1594091662, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpd`
--

CREATE TABLE `skpd` (
  `id_skpd` int(3) NOT NULL,
  `skpd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skpd`
--

INSERT INTO `skpd` (`id_skpd`, `skpd`) VALUES
(1, 'Camat Wonogiri'),
(2, 'Camat Selogiri'),
(3, 'Camat Ngadirojo'),
(4, 'Camat Nguntoronadi'),
(5, 'Camat Wuryantoro'),
(6, 'Camat Manyaran'),
(7, 'Camat Pracimantoro'),
(8, 'Camat Eromoko'),
(9, 'Camat Baturetno'),
(10, 'Camat Batuwarno'),
(11, 'Camat Giriwoyo'),
(12, 'Camat Giritontro'),
(13, 'Camat Paranggupito'),
(14, 'Camat Karangtengah'),
(15, 'Camat Tirtomoyo'),
(16, 'Camat Jatisrono'),
(17, 'Camat Jatipurno'),
(18, 'Camat Girimarto'),
(19, 'Camat Sidoharjo'),
(20, 'Camat Jatiroto'),
(21, 'Camat Purwantoro'),
(22, 'Camat Slogohimo'),
(23, 'Camat Kismantoro'),
(24, 'Camat Bulukerto'),
(25, 'Camat Puhpelem'),
(26, 'Setda'),
(27, 'Setwan'),
(28, 'Inspektorat'),
(29, 'Bappeda dan Litbang'),
(30, 'BKD'),
(31, 'Dinas PMD'),
(32, 'Dinas PPKB dan PBA'),
(33, 'Dinas PMPTSP'),
(34, 'RSUD'),
(35, 'DPU'),
(36, 'Dislapernak'),
(37, 'Diskominfo'),
(38, 'DIspera dan KPP'),
(39, 'Disperfan dan Pangan'),
(40, 'Dinas P dan K'),
(41, 'Dinsos'),
(42, 'Dinas LH'),
(43, 'Dinkes'),
(44, 'Dispora'),
(45, 'Disdukcapil'),
(46, 'Disnaker'),
(47, 'Dinas KUKM dan Perindag'),
(48, 'Dinas Kearsipan'),
(49, 'Dishub'),
(50, 'BPKD'),
(51, 'BPBD'),
(52, 'Satpol PP'),
(53, 'Kesbangpol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `informasi_publik`
--
ALTER TABLE `informasi_publik`
  ADD PRIMARY KEY (`id_informasi`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_skpd` (`id_skpd`);

--
-- Indeks untuk tabel `jenis_informasi`
--
ALTER TABLE `jenis_informasi`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kotak_saran`
--
ALTER TABLE `kotak_saran`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `type` (`tipe_member`);

--
-- Indeks untuk tabel `member_type`
--
ALTER TABLE `member_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indeks untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indeks untuk tabel `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`id_skpd`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `informasi_publik`
--
ALTER TABLE `informasi_publik`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jenis_informasi`
--
ALTER TABLE `jenis_informasi`
  MODIFY `id_jenis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kotak_saran`
--
ALTER TABLE `kotak_saran`
  MODIFY `id_pesan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `member_type`
--
ALTER TABLE `member_type`
  MODIFY `id_type` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `skpd`
--
ALTER TABLE `skpd`
  MODIFY `id_skpd` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `informasi_publik`
--
ALTER TABLE `informasi_publik`
  ADD CONSTRAINT `id_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_informasi` (`id_jenis`),
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `id_skpd` FOREIGN KEY (`id_skpd`) REFERENCES `skpd` (`id_skpd`);

--
-- Ketidakleluasaan untuk tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `type` FOREIGN KEY (`tipe_member`) REFERENCES `member_type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
