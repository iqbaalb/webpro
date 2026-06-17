import 'package:flutter/material.dart';

/// Class ini bertugas menyimpan dan mengelola nilai counter
/// menggunakan ChangeNotifier (sesuai konsep Provider).
class CounterProvider extends ChangeNotifier {
  int _counter = 0;

  int get counter => _counter;

  /// Menambah nilai counter sebanyak 1, lalu memberi tahu
  /// semua widget yang "mendengarkan" agar UI ikut update.
  void increment() {
    _counter++;
    notifyListeners();
  }
}
