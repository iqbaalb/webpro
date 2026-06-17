import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Tugas Widget Flutter Iqbal Bawani',
      home: const HomePage(),
    );
  }
}

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  final List<String> data = const [
    "Data 1",
    "Data 2",
    "Data 3",
    "Data 4",
    "Data 5",
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("Tugas Widget Flutter"),
        backgroundColor: Colors.blue,
      ),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(12),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              const Text(
                "1. Container",
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              Container(
                width: double.infinity,
                height: 80,
                alignment: Alignment.center,
                color: Colors.orange,
                child: const Text(
                  "Ini Container",
                  style: TextStyle(color: Colors.white),
                ),
              ),

              const SizedBox(height: 20),

              const Text(
                "2. GridView",
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              SizedBox(
                height: 200,
                child: GridView.count(
                  crossAxisCount: 3,
                  children: List.generate(
                    6,
                    (index) => Card(
                      color: Colors.lightBlue,
                      child: Center(
                        child: Text(
                          "Item ${index + 1}",
                          style: const TextStyle(color: Colors.white),
                        ),
                      ),
                    ),
                  ),
                ),
              ),

              const SizedBox(height: 20),

              const Text(
                "3. ListView",
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              SizedBox(
                height: 150,
                child: ListView(
                  children: const [
                    ListTile(title: Text("A")),
                    ListTile(title: Text("B")),
                    ListTile(title: Text("C")),
                  ],
                ),
              ),

              const SizedBox(height: 20),

              const Text(
                "4. ListView.builder",
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              SizedBox(
                height: 180,
                child: ListView.builder(
                  itemCount: data.length,
                  itemBuilder: (context, index) {
                    return ListTile(
                      leading: const Icon(Icons.star),
                      title: Text(data[index]),
                    );
                  },
                ),
              ),

              const SizedBox(height: 20),

              const Text(
                "5. ListView.separated",
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              SizedBox(
                height: 180,
                child: ListView.separated(
                  itemCount: data.length,
                  separatorBuilder: (context, index) =>
                      const Divider(thickness: 1),
                  itemBuilder: (context, index) {
                    return ListTile(title: Text("Item ${index + 1}"));
                  },
                ),
              ),

              const SizedBox(height: 20),

              // STACK
              const Text(
                "6. Stack",
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
              SizedBox(
                height: 150,
                child: Stack(
                  children: [
                    Container(width: 150, height: 150, color: Colors.green),
                    Positioned(
                      top: 40,
                      left: 30,
                      child: Container(
                        width: 100,
                        height: 60,
                        color: Colors.red,
                      ),
                    ),
                    const Positioned(
                      top: 60,
                      left: 50,
                      child: Text(
                        "STACK",
                        style: TextStyle(
                          color: Colors.white,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
