# Uygulama Nasıl Çalışır?
Uygulama bir [BFXM] uygulmasıdır. Numara sahibi [BFXM]'e yönlendirilmiş [Bulutfon] numaralarından birini arar.Eğer arayan kişinin bilgileri(isim,soyad,telno) DB'de bulunuyorsa aranan kişinin telefonuna arayan kişinin ismi ve soyismi gönderilerek arama yapılır.Ancak DB'de arayan kişinin bilgileri yok ise 10 numaralı menuye yönlendirilir.



#Uygulama Nasıl Kullanılır ?
- Veritabanı ve tabloları oluşturalım.
- Veritabanını bir telefon rehberi olarak düşünelim ve kişilerin bilgilerini veritabanına kayıt edelim.
- Connect.php içerisine girerek username,password kısımlarına kendi Veritabanı bilgilerimizi yazalım.
- Son olarak bulutfon hesabınızdan [BFXM oluşturmalı] ve bir numaraya yönledirmelisiniz.


---
- Arayan numara DB'de var ise BFON dökümanı şu şekilde olur.
```sh
{
    "bfxm": {
        "version": 1
    },
    "seq": [
        {
            "action": "set_caller_name",
            "args": {
                "caller_name": "mehmet dik"
            }
        }
    ]
}
```

- Arayan numara DB'de yok ise BFON dökümanı şu şekilde olur.
```sh
{
    "bfxm": {
        "version": 1
    },
    "seq": [
        {
            "action": "dial",
            "args": {
                "destination" : 10
            }
        }
    ]
}
```

# MySQL Sorguları
DB oluşturmak

```sh
CREATE DATABASE notifications;
```

Tablo oluşturmak

```sh
CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `phone` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
)
```

License
----

The MIT License (MIT)

Copyright (c) 2015 Mehmet Dik

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.


[BFXM]:https://github.com/bulutfon/documents/tree/master/BFXM
[Bulutfon]:https://www.bulutfon.com/
[BFXM oluşturmalı]:https://www.youtube.com/watch?v=4DeFu8JvG3o
