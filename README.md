# Dev Toolbox

Tek dosyalık, tarayıcıda çalışan geliştirici yardımcıları. JSON/XML biçimlendirme ve
doğrulama, Base64, URL kodlama, UTF-8 onaltılık dönüşümü, kriptografik özetler (hash) ve
JWT çözümleme tek sayfada, sekmeli bir arayüzde toplanır. Girdi hiçbir yere gönderilmez.

- Dosya: `devtoolbox.php` (tek dosya, ~67 KB)
- Çalıştığı yer: tarayıcı (istemci tarafı)
- Sunucu tarafı kod: yok

## Amaç

Günlük geliştirme işlerinde sık gereken küçük dönüşümleri, sekme değiştirmeden ve
veriyi üçüncü taraf bir siteye kopyalamadan yapmak.

## Özellikler

Sekmeler: **JSON**, **XML**, **Base64**, **URL**, **UTF-8**, **Hash**, **JWT**.

- JSON: biçimlendir, sıkıştır (minify), doğrula. Hata durumunda satır ve sütun gösterilir.
- XML: doğrula ve hata konumunu bildir.
- Base64: metin → Base64 ve Base64 → metin (UTF-8 güvenli).
- URL: `encodeURIComponent` / `decodeURIComponent` karşılığı dönüşüm.
- UTF-8: metin ↔ onaltılık bayt gösterimi.
- Hash: `crypto.subtle` ile SHA-1, SHA-256, SHA-384, SHA-512.
- JWT: başlık (header) ve yükü (payload) çözümler; imza **doğrulanmaz** ve bu durum
  arayüzde açıkça yazılır. `exp`/`nbf` kontrolü de yapılmaz.
- Sonuçları kopyalama düğmeleri (`data-copy-target`), durum satırı ve klavye erişimi.

## Ekran görüntüsü

Bu depoda ekran görüntüsü **yoktur**; uydurma görsel yoktur. Kendi görüntünüzü üretmek
için aracı açıp 1440 px ve 390 px genişlikte ekran görüntüsü alın; hangi tarayıcı ve
görünüm genişliğiyle alındığını belirtin.

## Gereksinimler

- Güncel Chrome, Edge, Firefox veya Safari.
- `TextEncoder`/`TextDecoder`, `crypto.subtle` (yalnızca güvenli bağlamda: `https://` veya
  `localhost`), `navigator.clipboard` (kopyalama düğmeleri için; yoksa yedek yol kullanılır).
- JavaScript açık olmalıdır.
- Ağ bağlantısı gerekmez; CDN, harici font veya uzak kütüphane yoktur.

## Çalıştırma

```powershell
python -m http.server 8000
# veya
php -S 127.0.0.1:8000
```

`http://127.0.0.1:8000/devtoolbox.php` adresini açın. `crypto.subtle` yalnızca güvenli
bağlamda tanımlıdır; `file://` veya düz `http://` üzerinden uzak bir sunucuda Hash sekmesi
çalışmayabilir. `localhost` güvenli bağlam sayılır.

## Kullanım

1. Üstteki sekmelerden aracı seçin.
2. Girdiyi yapıştırın; biçimlendirme/doğrulama düğmesini kullanın.
3. Sonuç alanındaki metni kopyalayın veya kopyalama düğmesine basın.
4. JWT sekmesinde yalnızca çözümleme yapılır; belirteci güvenilir saymayın.

## Teknik ayrıntılar

- JSON ayrıştırma `JSON.parse` ile yapılır; motorun hata mesajından konum bilgisi
  (`position`, satır/sütun) çıkarılır ve kullanıcıya Türkçe özetlenir.
- XML doğrulaması `DOMParser` ile yapılır; `parsererror` düğümünden satır/sütun okunur.
- Base64 dönüşümü UTF-8 için `TextEncoder` + `btoa`/`atob` üzerinden bayt dizisiyle
  yapılır; çok baytlı karakterler bozulmaz.
- Hash için tarayıcının `crypto.subtle.digest` API'si kullanılır; hash hesabı sayfa
  dışına çıkmaz.
- JWT çözümlemesi Base64URL kodunu çözer; imza, anahtar veya süre doğrulanmaz.
- Saf mantık fonksiyonları arayüzden bağımsızdır (`parseJson`, `formatJson`,
  `utf8ToBase64`, `decodeJwt`, `validateXml` ...).

## Sınırlar ve güvenlik

- Girdi sınırı: **2 MB** (tek alan). Aşılırsa işlem yapılmaz ve neden bildirilir.
- Ağ isteği yoktur; `fetch`, form gönderimi, çerez veya analitik kullanılmaz.
- Kullanıcı verisi DOM'a `textContent` ile yazılır; `innerHTML` kullanılmaz. JSON içindeki
  `<script>` veya `onerror` metni düz metin olarak görünür, çalışmaz.
- JWT imzası doğrulanmadığı için üretim kararlarında güvenlik kontrolü olarak kullanılamaz.
- Sayfa yenilendiğinde girdiler ve sonuçlar kaybolur; kalıcı depolama yoktur.

## Lisans

- Bu proje için **henüz bir lisans seçilmemiştir**; bu depoda `LICENSE` dosyası yoktur.
  Yayına almadan önce sahibinin lisans seçip eklemesi gerekir. Bu README lisans vaadi değildir.
- Üçüncü taraf kod yoktur; tüm dönüşümler tarayıcı yerleşik API'leriyle yapılır.

## Test edilenler

2026-10-28, Edge/Chromium 156 ve PHP 8.3.36 ile:

- Dosya portfolyo dışındaki geçici bir klasörden servis edildi: `HTTP 200`, tek `<h1>`,
  harici kaynak yok, konsol hatası yok.
- JSON biçimlendirme doğru çıktı verdi; bozuk JSON'da satır 1 / sütun 8 bildirildi.
- Base64 gidiş-dönüş (`şğü`) ve URL gidiş-dönüş (`a b&c`) bozulmadan çalıştı.
- UTF-8 onaltılık gidiş-dönüş (`Aş`) doğru.
- XML geçerli/geçersiz ayrımı doğru.
- Hash (`SHA-256`, `abc`) beklenen özetle başladı.
- JWT başlığı çözüldü; arayüz imza doğrulanmadığını yazıyor.
- JSON içindeki `<img onerror>` metni düz metin olarak kaldı.
- Arayüz üzerinden "Biçimlendir" akışı gerçek girdiyle çalıştı.
- 1440 px ve 390 px genişlikte yatay taşma yok.

## Test edilmeyenler ve bilinen sınırlar

- Firefox ve Safari'de gerçek tarayıcı testi yapılmadı.
- Gerçek mobil cihaz ve ekran okuyucu testi yapılmadı.
- Çok büyük (yaklaşık 2 MB) girdilerde tarayıcı başına performans ölçülmedi.
- JWT imza/süre doğrulaması bilinçli olarak yoktur; eklenmesi kapsam dışıdır.
- `crypto.subtle` bulunmayan bağlamlarda Hash sekmesi çalışmaz; arayüz bunu bildirir.

## Ayrı GitHub deposu olarak yayınlama

1. Bu klasörü yeni depoya kopyalayın.
2. GitHub Pages için dosyayı **`index.html`** olarak yeniden adlandırın (Pages `.php`
   dosyalarını çalıştırmaz, indirme olarak sunabilir).
3. Pages → "Deploy from a branch" → `main` / `root`.
4. Yayın sonrası HTTPS üzerinden Hash sekmesini ve kopyalama düğmelerini doğrulayın.
5. Lisans seçip `LICENSE` ekleyin; gerçek ekran görüntüsü ekleyin.
