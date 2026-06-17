# Laporan Praktik Modul 12 & 13
## Implementasi Provider dan Notifikasi pada Flutter

### 1. Cara Kerja Provider

State counter dikelola oleh class `CounterProvider` yang merupakan turunan dari `ChangeNotifier`. Class ini menyimpan nilai counter secara privat (`_counter`) dan menyediakan method `increment()` untuk menambah nilainya sebanyak 1. Setiap kali `increment()` dipanggil, method ini juga memanggil `notifyListeners()` agar seluruh widget yang "berlangganan" pada provider ini tahu bahwa datanya berubah.

Pada `main.dart`, root widget aplikasi dibungkus dengan `ChangeNotifierProvider`, sehingga instance `CounterProvider` tersedia untuk seluruh widget di bawahnya melalui `BuildContext`. Di halaman utama (`CounterPage`), nilai counter diambil dengan `context.watch<CounterProvider>().counter`. Penggunaan `watch` membuat widget ini otomatis melakukan rebuild setiap kali `notifyListeners()` dipanggil, sehingga tampilan angka counter selalu sinkron dengan data tanpa perlu `setState()` manual.

Saat tombol "Tambah" ditekan, aksi penambahan dipanggil melalui `context.read<CounterProvider>().increment()`. `read` dipakai (bukan `watch`) karena pemanggilan ini terjadi di dalam callback `onPressed`, bukan di bagian `build()`, sehingga tidak perlu memicu rebuild tambahan di titik tersebut.

### 2. Cara Kerja Notifikasi

Notifikasi pada aplikasi ini menggunakan **Local Notification** melalui package `flutter_local_notifications`, dipilih karena lebih sederhana dibanding FCM dan tidak memerlukan koneksi server/internet.

Inisialisasi dilakukan satu kali di fungsi `main()` sebelum `runApp()` dipanggil, lewat `NotificationService().init()`. Di dalamnya, `AndroidInitializationSettings` mengatur ikon notifikasi default, kemudian plugin `FlutterLocalNotificationsPlugin` diinisialisasi agar siap digunakan di seluruh aplikasi.

Setiap kali tombol "Tambah" ditekan, urutan prosesnya adalah: (1) nilai counter ditambah lewat Provider, (2) nilai terbaru diambil, lalu (3) method `showCounterNotification(newValue)` dipanggil. Method ini membuat konfigurasi `AndroidNotificationDetails` (channel id, nama channel, tingkat importance/priority tinggi), lalu memanggil `_notificationsPlugin.show()` dengan judul **"Counter Update"** dan isi pesan **"Nilai counter saat ini: X"**, di mana `X` adalah nilai counter yang baru saja diperbarui. Notifikasi ini langsung ditampilkan oleh sistem operasi Android secara native.

### Kesimpulan

Provider digunakan sebagai state management agar perubahan data counter dapat tersebar ke UI secara reaktif tanpa `setState`, sedangkan Local Notification digunakan untuk memberi umpan balik di luar layar aplikasi (notification tray) setiap kali state tersebut berubah. Kombinasi keduanya menunjukkan bagaimana state management dan notifikasi dapat saling terhubung dalam satu alur aksi pengguna.