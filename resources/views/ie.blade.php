User::create([
    'name' => 'Fajar Setiawan',
    'email' => 'Fajar@mail.com',
    'password' => bcrypt('12345678')
    ]);
User::create([
    'name' => 'Siti Zahra Zahrona',
    'email' => 'Ara@mail.com',
    'password' => bcrypt('12345678')
    ]);

Category::create(['name' => 'Web Application', 'slug' => 'web']);
Category::create(['name' => 'Data Analysis', 'slug' => 'stat']);

Post::create([
    'title' => 'First Statistics Portfolio',
    'category_id' => 2,
    'user_id' => 2,
    'slug' => 'first-statistics-portfolio',
    'imgcover' => 'portfolio-1.jpg',
    'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, ea.',
    'body' => '<p>ipsum dolor sit amet consectetur adipisicing elit. Vero in ut nesciunt repellendus, ex commodi laboriosam atque reprehenderit nisi cupiditate excepturi dolor rem est voluptates dignissimos alias minus modi? Ratione totam, saepe similique voluptatum, cum commodi velit voluptate nemo temporibus nulla ea labore adipisci dignissimos, quis vel debitis voluptates eligendi explicabo odit magni eum ipsum ducimus.</p> <p> Placeat enim unde repudiandae? Earum, et unde? Eaque consequatur nulla accusamus id commodi? Sunt aut at animi odit beatae, velit explicabo qui modi rerum, in quidem eius quod placeat laboriosam possimus, iusto itaque dicta autem unde. Porro, voluptatibus obcaecati at tempora enim hic numquam temporibus consequuntur cumque distinctio neque? Earum, placeat voluptas? Obcaecati temporibus esse ipsum placeat possimus, consequatur deserunt excepturi perferendis odit doloribus maiores numquam reprehenderit quidem quia provident dolore rerum repellendus? Sed, dolorum odit ut eveniet incidunt aliquam deleniti aspernatur rem molestias illo exercitationem, sunt soluta temporibus omnis possimus, molestiae nesciunt ullam earum facere assumenda suscipit repellendus ratione quia laborum.</p> <p> Ea labore eveniet earum exercitationem sint fugit porro eligendi perspiciatis accusamus optio aliquam, omnis ipsam fuga obcaecati vitae ab quo iusto. Amet quo perspiciatis ab cumque hic velit iste consectetur, quas et eveniet quibusdam? Ab itaque voluptas omnis cumque, magnam molestiae accusantium.</p>'
])