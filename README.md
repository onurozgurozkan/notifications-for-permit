# notifications-for-permit

1 Mayısta yürürlüğe giren [ELEKTRONİK TİCARETİN DÜZENLENMESİ](http://www.resmigazete.gov.tr/eskiler/2014/11/20141105-1.htm) kanunun gereğince kullanıcılara izinsiz bildirim göndermek yasaklandı.
Bu uygulama [Bulutfon](bulutfon.com) müşterileri için kişilerin bildirim alma isteklerini liste halinde veritabanına kaydeder. Daha sonra database deki listeleri istediğimiz gibi kullanabiliriz.

# Uygulama Nasıl Çalışır?

Uygulama bir [BFXM](https://github.com/bulutfon/documents/tree/master/BFXM) uygulmasıdır. Numara sahibi BFXM'e yönlendirilmiş bulutfon numaralarından birini arar. Otomatik yönlendirmeler devreye girer.
Kullanıcıdan bildirim almak istiyorsa 1'e istemiyorsa 2' ye basması istenir. Alınan veriler DB' ye numara, cevap ve tarih olarak yazılır.
Numara veritabanına önceden eklenmiş ise numaranın son aramada verdiği cevap alınır. Aynı numaranın birden fazla kayıt bırakması engellenmiş olunur.

# Uygulama Nasıl Kullanılır?

- Karşılama, kapanış, soru ve yanlış girdi de okunması gereken 4 ses dosyası sounds klasörü içeriesine eklenmelidir.
- Kaynak sağlayacak online adress belirlenmeli ve dosya oraya yüklenmelidir.
- Sonra eklenen dosyanın adresi BFXM' e tanıtılmalıdır.

### Version

0.1.0

# MySQL Sorguları

Veritabanı tablosu oluşturma

```sh
CREATE DATABASE notifications;
```
Table oluşturmak
```sh
CREATE TABLE notification_for_permit
(
  number VARCHAR(15),
  answer INT(2),
  date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE (number)
);
```

# License

MIT
