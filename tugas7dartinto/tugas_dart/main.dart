import 'dart:io';

void main() {
  List<List<int>> data = [];

  // Baris 1
  List<int> baris1 = [];
  for (int i = 1; i <= 4; i++) {
    baris1.add(i * 6);
  }

  // Baris 2
  List<int> baris2 = [];
  int ganjil = 3;
  for (int i = 0; i < 5; i++) {
    baris2.add(ganjil);
    ganjil += 2;
  }

  // Baris3
  List<int> baris3 = [];
  for (int i = 4; i < 10; i++) {
    baris3.add(i * i * i);
  }

  // baris 4
  List<int> baris4 = [];
  int nilai = 3;
  for (int i = 0; i < 7; i++) {
    baris4.add(nilai);
    nilai += 7;
  }

  data.add(baris1);
  data.add(baris2);
  data.add(baris3);
  data.add(baris4);

  print("Isi List:");
  for (var baris in data) {
    for (var nilai in baris) {
      stdout.write("$nilai ");
    }
    print("");
  }

  int a = 12;
  int b = 8;

  print("\nBilangan 1: $a");
  print("Bilangan 2: $b");
  print("FPB $a dan $b = ${fpb(a, b)}");
}

int fpb(int a, int b) {
  while (b != 0) {
    int sisa = a % b;
    a = b;
    b = sisa;
  }
  return a;
}
