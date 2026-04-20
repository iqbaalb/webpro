import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

// Root App
class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Aplikasi Sederhana',
      debugShowCheckedModeBanner: false,
      home: HomePage(),
    );
  }
}

class HomePage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Layout 1"), centerTitle: true),

      body: Column(
        children: [
          Container(
            width: double.infinity,
            padding: EdgeInsets.all(20),
            color: Colors.blue,
            child: Text(
              "HEADER",
              textAlign: TextAlign.center,
              style: TextStyle(color: Colors.white, fontSize: 18),
            ),
          ),

          Expanded(
            child: Center(
              child: Text("ISI KONTEN", style: TextStyle(fontSize: 16)),
            ),
          ),

          Container(
            width: double.infinity,
            padding: EdgeInsets.all(15),
            color: Colors.grey,
            child: Text(
              "FOOTER",
              textAlign: TextAlign.center,
              style: TextStyle(color: Colors.white),
            ),
          ),
        ],
      ),
    );
  }
}
