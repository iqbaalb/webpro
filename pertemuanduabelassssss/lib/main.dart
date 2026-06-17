import 'dart:io';
import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';
import 'package:flutter_local_notifications/flutter_local_notifications.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Tugas Kamera & Notifikasi',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(primarySwatch: Colors.indigo, useMaterial3: true),
      home: const HomePage(),
    );
  }
}

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  // Menyimpan file foto yang sudah diambil/dipilih
  File? _imageFile;

  // Objek untuk mengakses kamera & galeri
  final ImagePicker _picker = ImagePicker();

  // Objek untuk mengatur notifikasi lokal
  final FlutterLocalNotificationsPlugin _notificationsPlugin =
      FlutterLocalNotificationsPlugin();

  @override
  void initState() {
    super.initState();
    _initNotification();
  }

  // ---------------------------------------------------------------------
  // Inisialisasi plugin notifikasi lokal (dipanggil sekali saat app dibuka)
  // ---------------------------------------------------------------------
  Future<void> _initNotification() async {
    const AndroidInitializationSettings androidSettings =
        AndroidInitializationSettings('@mipmap/ic_launcher');

    const InitializationSettings initSettings = InitializationSettings(
      android: androidSettings,
    );

    await _notificationsPlugin.initialize(initSettings);
  }

  // ---------------------------------------------------------------------
  // Menampilkan notifikasi lokal setelah foto berhasil diambil/dipilih
  // ---------------------------------------------------------------------
  Future<void> _showNotification() async {
    const AndroidNotificationDetails androidDetails =
        AndroidNotificationDetails(
      'foto_channel_id', // id channel
      'Notifikasi Foto', // nama channel
      channelDescription: 'Notifikasi setelah foto berhasil diambil/dipilih',
      importance: Importance.high,
      priority: Priority.high,
    );

    const NotificationDetails notifDetails = NotificationDetails(
      android: androidDetails,
    );

    await _notificationsPlugin.show(
      0, // id notifikasi
      'Foto Berhasil!', // judul notifikasi
      'Foto kamu sudah berhasil diambil dan ditampilkan di aplikasi.',
      notifDetails,
    );
  }

  // ---------------------------------------------------------------------
  // Fungsi untuk membuka kamera secara langsung
  // ---------------------------------------------------------------------
  Future<void> _ambilFotoDariKamera() async {
    final XFile? hasilFoto = await _picker.pickImage(
      source: ImageSource.camera,
      imageQuality: 80,
    );

    if (hasilFoto != null) {
      setState(() {
        _imageFile = File(hasilFoto.path);
      });
      await _showNotification();
    }
  }

  // ---------------------------------------------------------------------
  // Fungsi untuk memilih foto dari galeri
  // ---------------------------------------------------------------------
  Future<void> _pilihFotoDariGaleri() async {
    final XFile? hasilFoto = await _picker.pickImage(
      source: ImageSource.gallery,
      imageQuality: 80,
    );

    if (hasilFoto != null) {
      setState(() {
        _imageFile = File(hasilFoto.path);
      });
      await _showNotification();
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Kamera & Notifikasi'),
        centerTitle: true,
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            // Baris tombol: Kamera & Galeri
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                ElevatedButton.icon(
                  onPressed: _ambilFotoDariKamera,
                  icon: const Icon(Icons.camera_alt),
                  label: const Text('Ambil Foto'),
                ),
                ElevatedButton.icon(
                  onPressed: _pilihFotoDariGaleri,
                  icon: const Icon(Icons.photo_library),
                  label: const Text('Pilih Galeri'),
                ),
              ],
            ),

            const SizedBox(height: 24),

            // Area menampilkan foto
            Expanded(
              child: Container(
                width: double.infinity,
                decoration: BoxDecoration(
                  border: Border.all(color: Colors.grey),
                  borderRadius: BorderRadius.circular(12),
                ),
                clipBehavior: Clip.hardEdge,
                child: _imageFile == null
                    ? const Center(child: Text('Belum ada foto yang dipilih'))
                    : Image.file(_imageFile!, fit: BoxFit.contain),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
