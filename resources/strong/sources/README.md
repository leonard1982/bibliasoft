## Strong sources (downloaded 2026-02-19)

This folder stores Strong dictionary source files for later import to the app.

### Greek
- Source repo: https://github.com/morphgnt/strongs-dictionary-xml
- File: `morphgnt-strongs-dictionary-xml/strongsgreek.xml`
- License note: The upstream README states release under CC0 (public domain dedication).

### Hebrew
- Source repo: https://github.com/openscriptures/strongs
- File: `openscriptures-strongs/hebrew/strongshebrew.dat`
- License note: File header states Strong's original data is public domain; corrected edition text includes a permissive open-source grant and copyright notice for Open Scriptures contributors.

### Also downloaded in Open Scriptures package
- `openscriptures-strongs/hebrew/StrongHebrewG.xml`
- `openscriptures-strongs/greek/StrongsGreekDictionaryXML_1.4/strongsgreek.xml`

Note: `StrongHebrewG.xml` includes metadata mentioning TWOT copyright in the header.
For safe first integration, prefer `strongshebrew.dat` unless we explicitly need
the extra OSIS structure and verify reuse boundaries.

### Spanish dictionary (MyBible module)
- File: `spanish/Diccionario-Strong-en-Espanol.bok.mybible`
- Usage: imported by `scripts/build_strongs_lexicon.php` as preferred Spanish text.
- Note: source is a third-party module distribution; validate redistribution terms
  before packaging/public release.
