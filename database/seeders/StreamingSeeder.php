<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Workshop;
use Illuminate\Support\Str;

class StreamingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('streamings')->insert([
            [
                'title' => 'Tailwind: Intro & Setup',
                'description' => '<p>Tailwind CSS makes it quicker to write and maintain the code of your application. By using this utility-first framework, 
                 you dont have to write custom CSS to style your application. Instead, you can use utility classes to control the padding, margin, color, font, shadow, and more of your application.',
                'url' => 'https://www.youtube.com/embed?v=bxmDnn7lrnk&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw',
                'workshop_id' => '1',
            ],[
                'title' => 'Tailwind:  HTML Template',
                'description' => '',
                'url' => 'https://www.youtube.com/embed?v=3ZMUgga6SsY&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw&index=2',
                'workshop_id' => '1',

            ],[
                'title' => 'Tailwind:  Fonts & Colors',
                'description' => '<h1>Setting the text color</h1>
                <p>Control the text color of an element using the</p> <code>text-{color}</code> <p>utilities.</p>',
                'url' => 'https://www.youtube.com/embed?v=w0KZhi3DD-0&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw&index=3',
                'workshop_id' => '1',

            ],[
                'title' => 'Tailwind:  Margin, Padding & Borders',
                'description' => '<p>As important as CSS margin, padding, and border are, most developers often struggle to understand this concept.</p>
                <br>
                <p>New developers usually use these properties without realizing or acknowledging their importance when rendering items on our page. Although the Tailwind width does not include the margin, padding or borders.</p>
                <br>
                <p>In today’s Tailwind CSS tutorial, we will explain what these properties are, when to use them, and how to use them when we build a project.</p>
                <br>
                <li>Table of content</li>
                <li>Box model</li>
                <li>content</li>
                <li>Tailwind CSS padding</li>
                <li>Tailwind CSS margin</li>
                <li>Tailwind CSS border</li>
                <p>Project using these properties</p>',
                'url' => 'https://www.youtube.com/embed?v=1g4W2U-l350&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw&index=4',
                'workshop_id' => '1',

            ],[
                'title' => 'Tailwind:  Config',
                'description' => '<h1>Configuration</h1>
                <p>A guide to configuring and customizing your Tailwind installation.</p>
                <br>
                <p>Because Tailwind is a framework for building bespoke user interfaces, it has been designed from the ground up with customization in mind.</p>',
                'url' => 'https://www.youtube.com/embed?v=6UVQlB1eo5A&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw&index=5',
                'workshop_id' => '1',

            ],[
                'title' => 'Tailwind:  Custom Fonts',
                'description' => '<h1>Font Family</h1>
                <p>Utilities for controlling the font family of an element.</p>

                <code>font-sans	font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-serif	font-family: ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
                font-mono	font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;</code>',
                'url' => 'https://www.youtube.com/embed?v=arfDRUIZOiw&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw&index=6',
                'workshop_id' => '1',

            ],[
                'title' => 'Tailwind:  Using Flexbox',
                'description' => '<h1>Flex</h1>
                 <p>Utilities for controlling how flex items both grow and shrink.</p>',
                'url' => 'https://www.youtube.com/embed?v=WK6u8YDYqak&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw&index=7',
                'workshop_id' => '1',

            ],[
                'title' => 'Tailwind:  Responsive Classes',
                'description' => '<h1>Responsive Design</h1>
                <p>Using responsive utility variants to build adaptive user interfaces.</p>
                <br>
                <p>Every utility class in Tailwind can be applied conditionally at different breakpoints, which makes it a piece of cake to build complex responsive interfaces without ever leaving your HTML.</p>
                <br>
                <p>There are five breakpoints by default, inspired by common device resolutions:</p>',
                'url' => 'https://www.youtube.com/embed?v=VYFjvMfVv2o&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw&index=8',
                'workshop_id' => '1',

            ],[
                'title' => 'Tailwind:  Cards',
                'description' => '<h1>Tailwind CSS Cards - Flowbite</h1>
                <p>Get started with a large variety of Tailwind CSS card examples for your web project</p>',
                'url' => 'https://www.youtube.com/watch?v=vqKie-xmcFs&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw&index=9',
                'workshop_id' => '1',

            ],[
                'title' => 'Tailwind:  Badges',
                'description' => '<h1>Tailwind CSS Badges - Flowbite</h1>
                 <p>Use Tailwind CSS badges as elements to show counts or labels separately or inside other components</p>',
                'url' => 'https://www.youtube.com/embed?v=cY0XJY98d3w&list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw&index=10',
                'workshop_id' => '1',

            ],
        ]);
    }
}