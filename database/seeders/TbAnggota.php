<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbAnggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `tb_anggota` (`id`, `nama`, `nip`, `unit_kerja`, `tanggal`, `no_telepon`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
 (1, 'Edial Alamsyah, S.Sos.',196507131989031005, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:03', NULL),
(2, 'Arwan, SE',196902051990021002, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:04', NULL),
(3, 'Indarno, ST.',196809131994031002, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:05', NULL),
(4, 'Gusti Irwandi, ST',197308252007011006, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:06', NULL),
(5, 'Dedi Oktari Safitri',197310311993031003, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:07', NULL),
(6, 'Melly Haryani, SE., MM.',197505162008012003, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:08', NULL),
(7, 'Asep Sanjaya',197710132007011007, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:09', NULL),
(8, 'Arik Yuliati, S.Sos.',197407101998031003, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:10', NULL),
(9, 'Feronika, ST.',197807292008042001, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:11', NULL),
(10, 'Muhammad Maulana, ST',198007302008031001, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:12', NULL),
(11, 'Abubakar Siddiq, ST.',196811182007011005, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:13', NULL),
(12, 'Tarzan, ST',197406012007011010, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:14', NULL),
(13, 'Suryadi',196507082006041002, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:15', NULL),
(14, 'Lilis Suryani',196508271993112001, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:16', NULL),
(15, 'Aisah Kurniaty, BE',197007232006042003, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:17', NULL),
(16, 'Trimaningsih Budi Utami ',196705081993032004, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:18', NULL),
(17, 'Syaripudin, ST ',197309232007011007, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:19', NULL),
(18, 'Een Sumiarty, S.IP',197808162008012006, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:20', NULL),
(19, 'R. Abd. Rachim Kurniawan, ST ',197709262011011002, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:21', NULL),
(20, 'Gusmiadi, ST',197701072011011001, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:22', NULL),
(21, 'Muhammad Rijaluddin, SE',198511262010001004, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:23', NULL),
(22, 'Yusmalinda ',196602121989022002, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:24', NULL),
(23, 'Dedi Imansyah',196707052007011009, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:25', NULL),
(24, 'Antena Yulifentri',196807111990022001, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:26', NULL),
(25, 'Armizi, ST ',196910072007011007, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:27', NULL),
(26, 'Asmurani',197211072007011002, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:28', NULL),
(27, 'Suriyati, ST',196705252007012010, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:29', NULL),
(28, 'Marwiyah ',197107112007012006, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:30', NULL),
(29, 'Magdalena, ST',197310302007012005, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:31', NULL),
(30, 'Novita Sumarni, ST',197411012007012004, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:32', NULL),
(31, 'Ramlah Ruslan Dali ',197509072007012008, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:33', NULL),
(32, 'Ade Maulana Purnaman, ST',197603172007011002, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:34', NULL),
(33, 'Iman Jaya',197311102007011011, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:35', NULL),
(34, 'Priscilia',197412172007012005, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:36', NULL),
(35, 'Devi Mulyati',197909212008012006, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:37', NULL),
(36, 'Henny Darmiyanti ',198109012008012006, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:38', NULL),
(37, 'Fuji Haryanti',197105121995032001, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:39', NULL),
(38, 'Aris Susanto, ST. ',197904232008011004, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:40', NULL),
(39, 'Ani Rokhmiyati, A.Md.',198111142006042021, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:41', NULL),
(40, 'Dody Ahyat, ST',198110092009011004, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:42', NULL),
(41, 'Asmi Holdy ',198212152009011005, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:43', NULL),
(42, 'Repi Agusti',197702112006041009, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:44', NULL),
(43, 'Neulin Sohadi',197909022014061001, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:45', NULL),
(44, 'Haryati ',197110232007012005, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:46', NULL),
(45, 'Eko Kesumo ',197110282007011004, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:47', NULL),
(46, 'Dedy Yanto ',197409202007011004, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:48', NULL),
(47, 'Haryandi ',197110282007011004, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:49', NULL),
(48, 'Rusdi',196510051991031030, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:50', NULL),
(49, 'Desi Eka Putri ',198110132012122002, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:51', NULL),
(50, 'Syafrizal Effendi ',197303152012121003, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:52', NULL),
(51, 'Dedy Novianto ',197811282014061002, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:53', NULL),
(52, 'Hendro Wijaya, SE',198208052010011010, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:54', NULL),
(53, 'M. Effendi',196407051991011001, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:55', NULL),
(54, 'Sukses Sugito',196405252007011030, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:56', NULL),
(55, 'Ir. M. Ikhsan',19640514, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:57', NULL),
(56, 'Novan Alexander, ST',197411012007012004, 'Bina Marga', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(57, 'Tejo Suroso, ST.',197812142005021003, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(58, 'Ngadioyono, ST',196606242006041003, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(59, 'Sutio, ST',196610281986081001, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(60, 'Ir. Hazni ',196601131999032001, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(61, 'Nurhimat, ST ',196504111993031004, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(62, 'Fenti Eka Gusnita, S.Sos',196808091989032008, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(63, 'Nur Isrofah, SH',196611061993032003, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(64, 'Erpina, S.Ip. M.Si. ',198204162009032002, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(65, 'Tri Martini ',196908061997032004, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(66, 'Eko Hadi Saputra, ST., ME.',197901052008041001, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(67, 'Achmad Wadadi, ST ',196810241994011001, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(68, 'Sri Elmi Yenti, SE',197810162006042004, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(69, 'Zikra, SE ',1979060820021222006, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(70, 'Ira Maya Sopha, SE',198012192010012008, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(71, 'Siswadi, SE',196603051995021001, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(72, 'Hendro Sulistio',198207042008011005, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(73, 'Muhammad Sudin',197404062006041013, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(74, 'Sri Linda Puri S., A.Md. ',198310162011012004, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(75, 'Maidi',196506171991021003, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(76, 'Husni Riani ',197012142012122002, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(77, 'Mardatillah, A.Md.',198403232010012015, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(78, 'Syarkowi ',196506132006041004, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(79, 'Hernando Oktara',198710242019021003, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(80, 'M. Thariq Fagiari',199105302019021004, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(81, 'Karlenti',196910092007012010, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(82, 'Mery Kurniawati',198009182008012008, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(83, 'Gustiansyah ',199208302011011001, 'Sekretariat', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(84, 'Yasar, ST. ',196508051989021004, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(85, 'NazilaIdin',196708151998031005, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(86, 'Destiani ',196412041986032008, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(87, 'Rita Lusiana, A.Md',197002021998032003, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(88, 'Andi Rapiansyah, A.Md.',198310282009041002, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(89, 'Herawati', 107406152007012005, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(90, 'Fatimura ',196905171994011001, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(91, 'Vivi Evrianti',197503151997032002, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(92, 'Rizki Afriansyah',198104252008011003, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(93, 'Agustin Sumardi ',196408291988031001, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(94, 'A. Agus Riswanto',196408301998031001, 'Sunber Daya Air', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(95, 'Zamzami, SST',196405171992031001, 'Sunber Daya Air / Ba', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(96, 'Riskan Fandani ',196401121993111001, 'Sunber Daya Air / Ba', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(97, 'Vera Merdiaty, ST ',197705042009032001, 'Cipta Karya', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(98, 'Hj. Nila Oktavia, SE ',197710202002122004, 'Cipta Karya', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(99, 'Samsudin, BE',196702011997031002, 'Cipta Karya', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(100, 'Indra Gunawan, SE. ',197106302007011024, 'Cipta Karya', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(101, 'Lufty Al Dionesi',196606161991031006, 'Cipta Karya', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(102, 'Mirzan Nasyirin',196802071992031007, 'Cipta Karya', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(103, 'Leni Purnama',197701172002122003, 'Cipta Karya', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL),
(104, 'Ir. Nursayah Effendi ',196403161992111001, 'Cipta Karya', '2022-01-01', '-', '-', 'AKTIF', '2023-01-01 13:05:58', NULL);
");

        //DB::insert("INSERT INTO `tb_periode` (`id`, `nama`, `tanggal_mulai`, `tanggal_akhir`, `status`, `created_at`, `updated_at`) VALUES
        // (1, 'dadwaddwadawd', '2023-05-16', '2023-05-25', 'tidak aktif', '2023-05-21 20:17:27', '2023-05-21 20:22:57'),
        // (2, 'dwadda', '2023-05-16', '2023-05-25', 'aktif', '2023-05-21 20:17:27', '2023-05-21 20:22:57');");
    }
}
