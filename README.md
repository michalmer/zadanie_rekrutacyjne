# Zadania Rekrutacyjne

## Wprowadzenie
Zadania te mają na celu sprawdzenie umiejętności pracy w języku PHP z wykorzystaniem frameworka CodeIgniter3

---

## Zadanie 1
Wykorzystując framework **CodeIgniter3**, stwórz **CRUD** dla pracowników firmy (`employees`):
- Wyświetlanie listy pracowników.
- Tworzenie nowego pracownika.
- Edycja istniejącego pracownika.
- Usuwanie pracownika.

**Uwagi:**
- Projekt jest połączony z bazą danych MySQL. Dane dostępowe do bazy danych znajdują się w pliku `application/config/database.php`. https://codeigniter.com/userguide3/database/configuration.html
- Dane pracowników powinny zawierać pola: `id`, `first_name`, `last_name`, `phone_number`.
- Do operacji na bazie danych użyj modeli CodeIgnitera.
- Zamiast standardowych zapytań SQL wykorzystaj składnię dostępną w frameworku.
- Dokumentacja do bazy danych znajduje się na stronie: [Database Reference](https://codeigniter.com/userguide3/index.html).

---

## Zadanie 2
Dodaj pole `email` do tabeli pracowników, jeśli jeszcze go nie ma. Następnie:
- Dodaj walidację pola `email` podczas zapisu/edycji:
	- Adres email musi być poprawny.
	- Adres email musi być unikatowy dla każdego pracownika.
- Zapisanie pracownika jest możliwe tylko, jeśli wszystkie walidacje zostaną spełnione.

---

## Zadanie 3
Stwórz tabelę słownikową `position` dla stanowisk pracowników (np. "Developer", "Manager", "Tester"). Następnie:
- Połącz tabelę `employees` z tabelą `position` za pomocą klucza obcego.
- Wprowadź możliwość przypisania stanowiska pracownikowi:
	- Podczas dodawania nowego pracownika.
	- Podczas edycji pracownika.
- Wyświetlaj przypisane stanowisko na liście pracowników.
- Stwórz **CRUD** dla tabeli `position` (tworzenie, edycja, usuwanie, lista stanowisk).

---

## Zadanie 4
Rozbuduj aplikację o możliwość przypisywania przełożonego dla pracownika:
- Pracownik może mieć **jednego przełożonego**.
- Przełożony również jest pracownikiem.
- Pracownik będący szefem (nieposiadający przełożonego) nie powinien mieć żadnego powiązania wyżej.

**Wyświetlanie hierarchii:**
- Lista pracowników powinna być wyświetlana w formie hierarchii:
	- Szefowie na górze.
	- Pracownicy przypisani do szefów z odpowiednim wcięciem.

**Przykład hierarchii:**
- Krzysiek
  - Józef
- Anna
  - Ola
    - Zbigniew
  - Marysia
    - Stanisław
      - Konstanta

## Uruchomienie aplikacji

Aplikacja posiada konfigurację obrazów dockerowych

```
# zbudowanie obrazu i uruchomienie kontenera aplikacji
docker-compose up -d
```
Strona startowa `http://localhost:8080/Welcome`

Aplikacja będzie dostępna pod adresem `http://localhost:8080`

Dostęp internetowy do bazy danych: `http://localhost:8084`

Dane dostępowe do bazy danych:
```
host: rekrutacja_mysql
database: example_db
user: user
password: passwd
```
