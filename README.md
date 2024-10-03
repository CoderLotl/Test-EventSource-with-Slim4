<a id="readme-top"></a>

---
<h1>DOCUMENTATION</h1>

---

<h2 align="center">Test EventSource on Svelte, with PHP + Slim 4</h2>

<details>
    <summary>Table of Contents</summary>
    <ol>
        <li><a href="#about-the-project">About The Project</a></li>
        <ul><a href="#requirements">Requirements</a></ul>
        <ul>            
            <a href="#built-with">Built With</a>
        </ul>
        <li><a href="#getting-started">Getting Started</a></li>
        <li><a href="#usage">Usage</a></li>        
        <li><a href="#license">License</a></li>
        <li><a href="#contact">Contact</a></li>
    </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About the Project
---

This is an exploratory test of EventSource on Svelte, with PHP and Slim 4 as back-end.
The challenge wasn't great, yet it posed its difficulties, and as a first experience of how to do it counting with an almost absolute lack of documentation about how to use Server-Sent Events with Slim 4, it proved to be a good entertainment and puzzle.

**The concepts** boarded by this project are:

* EventSource and management of listeners at the front.
* Server Sent Events with Slim 4.
* Simple, real time unidirectional communications from server to client.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

---

### Requirements:

* **PHP >=7.2**
* **NPM**
* **A toaster to run this code on**



<p align="right">(<a href="#readme-top">back to top</a>)</p>

---

### Built With

* ![Static Badge](https://img.shields.io/badge/PHP%207.20-black?style=for-the-badge&logo=PHP&logoColor=blue)
    * ![Static Badge](https://img.shields.io/badge/Slim_4-black?style=for-the-badge&logo=PHP)
* ![Static Badge](https://img.shields.io/badge/Svelte-black?style=for-the-badge&logo=Svelte&logoColor=%23FF3E00)
* ![Static Badge](https://img.shields.io/badge/Tailwind%20CSS-black?style=for-the-badge&logo=tailwindcss&logoColor=%2306B6D4)
* ![Static Badge](https://img.shields.io/badge/Composer-black?style=for-the-badge&logo=composer&logoColor=%23885630)
* ![Static Badge](https://img.shields.io/badge/npm-black?style=for-the-badge&logo=npm&logoColor=%23CB3837)


<p align="right">(<a href="#readme-top">back to top</a>)</p>

---
### Getting Started

Getting this working is quite simple. Once you got a copy of the repository the next thing is downloading all the dependencies, for which you would make use of a terminal.

First you're gonna stand on the root, then make use of **Composer** with the next command:
* composer:
```
composer install
```

This will install all the needed dependencies and create the *autoload*, which is required.

The next thing is to install all the **Node** dependencies.
* node
```
cd client
npm install
npm run build
npm run dev
```

That's all.
Next thing is to start a PHP instance on the root with either **XAMPP/WAMPP** or your favorite web server package. You can also do it with a terminal.

Now just visit your localhost :).

<p align="right">(<a href="#readme-top">back to top</a>)</p>

---

### Usage

The app consists of 2 components: **One**, and **Two**.
Both are identical, except each has a button that redirects to the other, and each starts a connection to a different endpoint of the back.
Once the connection is stablished, they start receiving data from the back. That's all.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

---

### License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

---

### Contact

* ![Static Badge](https://img.shields.io/badge/Discord%3A-CoderLotl-gray?style=for-the-badge&logo=discord&logoColor=%235865F2&labelColor=black)
* ![Static Badge](https://img.shields.io/badge/Gmail%3A-j.e.delmar.87%40gmail.com-gray?style=for-the-badge&logo=gmail&logoColor=%23EA4335&labelColor=black)

<p align="right">(<a href="#readme-top">back to top</a>)</p>