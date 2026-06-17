import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'counter_provider.dart';
import 'notification_service.dart';

Future<void> main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await NotificationService().init();
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (_) => CounterProvider(),
      child: MaterialApp(
        title: 'Counter Provider & Notifikasi',
        debugShowCheckedModeBanner: false,
        theme: ThemeData(primarySwatch: Colors.blue, useMaterial3: true),
        home: const CounterPage(),
      ),
    );
  }
}

class CounterPage extends StatelessWidget {
  const CounterPage({super.key});

  @override
  Widget build(BuildContext context) {
    // context.watch akan membuat widget ini rebuild setiap
    // CounterProvider memanggil notifyListeners().
    final counterValue = context.watch<CounterProvider>().counter;

    return Scaffold(
      appBar: AppBar(
        title: const Text('Counter App - Provider & Notifikasi'),
        centerTitle: true,
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            const Text('Nilai Counter:', style: TextStyle(fontSize: 20)),
            const SizedBox(height: 8),
            Text(
              '$counterValue',
              style: const TextStyle(
                fontSize: 64,
                fontWeight: FontWeight.bold,
                color: Colors.blue,
              ),
            ),
            const SizedBox(height: 32),
            ElevatedButton.icon(
              onPressed: () => _tambahCounter(context),
              icon: const Icon(Icons.add),
              label: const Text('Tambah'),
              style: ElevatedButton.styleFrom(
                padding: const EdgeInsets.symmetric(
                  horizontal: 24,
                  vertical: 12,
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }

  Future<void> _tambahCounter(BuildContext context) async {
    // 1. Tambah nilai counter lewat Provider (tanpa rebuild widget ini).
    context.read<CounterProvider>().increment();

    // 2. Ambil nilai counter terbaru setelah bertambah.
    final newValue = context.read<CounterProvider>().counter;

    // 3. Tampilkan local notification berisi nilai counter terbaru.
    await NotificationService().showCounterNotification(newValue);
  }
}
