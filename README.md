# 🗺️ Lootopia API — Laravel 12

![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.4-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.4-orange?logo=mysql)

> **Projet d'étude – Mastère Développement Full Stack (M1 & M2)**  
> Client fictif : **Out of Cache**  
> Sujet : Plateforme de **chasses au trésor numériques** avec **géolocalisation**, **gamification** et **réalité augmentée**.

---

## 🎯 Objectif

L’API a pour but de fournir les services nécessaires au MVP de Lootopia :

- Gestion **utilisateurs** et **partenaires** (authentification JWT).
- CRUD des **chasses au trésor**, **étapes** et **indices**.
- Participation des joueurs, suivi de la **progression**.
- **Gamification** (scores, badges, classement).
- (M2) Gestion d’une **économie virtuelle** : monnaie, marketplace, transactions.

---

## 🧩 Stack technique

| Domaine | Technologie |
|----------|--------------|
| Framework | Laravel 12 |
| Langage | PHP 8.4 |
| Base de données | MySQL 8.4 |
| Authentification | JWT, bcrypt|
| Documentation API | Swagger |
| Tests | PestPHP |
| Sécurité | Bcrypt, validations, CORS |

---

## ⚙️ Installation

### 1️⃣ Cloner le dépôt
```bash
git clone https://github.com/A-Gaborit/Lootopia-API.git
cd Lootopia-API
```

### 2️⃣ Installer les dépendances
```bash
composer install
```

### 3️⃣ Créer et configurer le fichier `.env`
```bash
cp .env.example .env
```

Dans le fichier `.env`, configure la connexion à **MySQL** :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lootopia
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Générer le secret JWT
```bash
php artisan jwt:secret
```
Permet de générer un secret aléatoire pour l'authentification JWT.

### 5️⃣ Lancer les migrations et seeders
```bash
php artisan migrate --seed
```

### 6️⃣ Lancer le serveur
```bash
php artisan serve
```

> Par défaut : http://127.0.0.1:8000

---

## 🧠 Architecture du projet

```
Lootopia-API/
├── app/
│   ├── Http/Controllers/       # Contrôleurs API
│   ├── Http/Requests/          # Validations données entrantes
│   ├── Models/                 # Modèles Eloquent
│   └── Http/Middleware/        # Middleware (JWT, auth, etc.)
├── database/
│   ├── factories/              # Fabrications données
│   ├── migrations/             # Structure BDD
│   └── seeders/                # Données initiales
├── routes/
│   └── api.php                 # Routes API
└── tests/                      # Tests unitaires et fonctionnels
```

---

## 🔐 Sécurité

- Authentification JWT avec expiration.
- Hachage des mots de passe (bcrypt).
- Validation stricte des requêtes.
- Protection CORS.

---

## 📘 Documentation API

Une documentation interactive est disponible à l’adresse :

```
/api/documentation
```

Générée via **Swagger**.

---

## 👥 Auteurs

Projet réalisé par les étudiants du **Mastère Développement Full Stack de Sup de Vinci**

| Auteurs |
|--------------|
| Audrey |
| Léo |
| Souvanny |
| Erika |
| Victor|

---

