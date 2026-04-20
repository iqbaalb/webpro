import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(title: const Text('Tugas Flutter')),
        body: const Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text('NIM: 2311102130'),
              SizedBox(height: 10),
              Text('Nama: Iqbal Bawani'),
            ],
          ),
        ),
      ),
    );
  }
}
