import 'package:flutter_local_notifications/flutter_local_notifications.dart';

/// Class ini bertugas menangani semua hal terkait Local Notification.
class NotificationService {
  // Dibuat singleton agar instance-nya hanya satu di seluruh aplikasi.
  static final NotificationService _instance =
      NotificationService._internal();
  factory NotificationService() => _instance;
  NotificationService._internal();

  final FlutterLocalNotificationsPlugin _notificationsPlugin =
      FlutterLocalNotificationsPlugin();

  /// Inisialisasi plugin notifikasi, dipanggil sekali saat app start.
  Future<void> init() async {
    const AndroidInitializationSettings androidSettings =
        AndroidInitializationSettings('@mipmap/ic_launcher');

    const InitializationSettings initSettings = InitializationSettings(
      android: androidSettings,
    );

    await _notificationsPlugin.initialize(initSettings);
  }

  /// Menampilkan notifikasi setiap kali nilai counter bertambah.
  Future<void> showCounterNotification(int counterValue) async {
    const AndroidNotificationDetails androidDetails =
        AndroidNotificationDetails(
      'counter_channel', // channel id
      'Counter Notifications', // channel name
      channelDescription: 'Notifikasi setiap kali nilai counter bertambah',
      importance: Importance.high,
      priority: Priority.high,
    );

    const NotificationDetails notificationDetails = NotificationDetails(
      android: androidDetails,
    );

    await _notificationsPlugin.show(
      0, // id notifikasi (boleh tetap 0 agar notifikasi lama tertimpa)
      'Counter Update',
      'Nilai counter saat ini: $counterValue',
      notificationDetails,
    );
  }
}
