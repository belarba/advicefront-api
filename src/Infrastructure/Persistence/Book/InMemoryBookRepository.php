<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Book;

use App\Domain\Book\Book;
use App\Domain\Book\BookNotFoundException;
use App\Domain\Book\BookRepository;

class InMemoryBookRepository implements BookRepository
{
    /**
     * @var Book[]
     */
    private $books;

    /**
     * InMemoryBookRepository constructor.
     *
     * @param array|null $books
     */
    public function __construct(array $books = null)
    {
        $this->books = $books ?? [
            1 => new Book(1, 'Flexible Rails', 1933988509, 'https://s3.amazonaws.com/AKIAJC5RLADLUMVRPFDQ.book-thumb-images/armstrong.jpg', 'Rails is a fantastic tool for web application development, but its Ajax-driven interfaces stop short of the richness you gain with a tool like Adobe Flex. Simply put, Flex is the most productive way to build the UI of rich Internet applications, and Rails is the most productive way to rapidly build a database-backed CRUD application. Together, they\'re an amazing combination.    Flexible Rails is a book about how to use Ruby on Rails and Adobe Flex to build next-generation rich Internet applications (RIAs). The book takes you to the leading edge of RIA development, presenting examples in Flex 3 and Rails 2.    This book is not an exhaustive Ruby on Rails tutorial, nor a Flex reference manual. (Adobe ships over 3000 pages of PDF reference documentation with Flex.) Instead, it\'s an extensive tutorial, developed iteratively, how to build an RIA using Flex and Rails together. You learn both the specific techniques you need to use Flex and Rails together as well as the development practices that make the combination especially powerful.    The example application built in the book is MIT-licensed, so readers can use it as the basis for their own applications. In fact, one reader has already built an agile project management tool based on the book example!    With this book, you learn Flex by osmosis. You can read the book and follow along even if you have never used Flex before. Consider it \"Flex Immersion.\" You absorb the key concepts of Flex as you go through the process of building the application.    You will also learn how Flex and Rails integrate with HTTPService and XML, and see how RESTful Rails controller design gracefully supports using the same controller actions for Flex and HTML clients. The author will show you how Cairngorm can be used to architect larger Flex applications, including tips to use Cairngorm in a less verbose way with HTTPService to talk to Rails.    Flexible Rails is for both Rails developers who are interested in Flex, and Flex developers who are interested in Rails. For a Rails developer, Flex allows for more dynamic and engaging user interfaces than are possible with Ajax. For a Flex developer, Rails provides a way to rapidly build the ORM and services layer of the application."'),
            2 => new Book(2, 'Open Source SOA', 1933988541, 'https://s3.amazonaws.com/AKIAJC5RLADLUMVRPFDQ.book-thumb-images/davis.jpg', 'Service Oriented Architecture, or SOA, has become embraced by many organizations as a means of improving reusability of software assets; providing better alignment between business and IT; and, increasing agility for responding to demands in the marketplace. This is accomplished by breaking individual units of functionality into services that can then be exposed through open protocols and standards.    Until recently, many of the software technologies used for developing SOA-based solutions were limited to expensive, commercial offerings. However, that has now changed, and a compelling open source SOA platform can be implemented exclusively with open source products. This book identifies a suite of open source products that can be used for a building SOA environment, and describes how they can be integrated by practitioners. It includes a hands-on introduction to the products selected; a multitude of source code examples; and implementation through real-life case studies."'),
            3 => new Book(3, 'PHP in Action', 1932394753, 'https://s3.amazonaws.com/AKIAJC5RLADLUMVRPFDQ.book-thumb-images/reiersol.jpg', 'To keep programming productive and enjoyable, state-of-the-art practices and principles are essential. Object-oriented programming and design help manage complexity by keeping components cleanly separated. Unit testing helps prevent endless, exhausting debugging sessions. Refactoring keeps code supple and readable. PHP offers all this, and more.    PHP in Action shows you how to apply PHP techniques and principles to all the most common challenges of web programming, including:    Web presentation and templates  User interaction including the Model-View-Contoller architecture  Input validation and form handling  Database connection and querying and abstraction  Object persistence  This book takes on the most important challenges of web programming in PHP 5 using state-of-the art programming and software design techniques including unit testing, refactoring and design patterns. It provides the essential skills you need for developing or maintaining complex to moderately complex PHP web applications."'),
            4 => new Book(4, 'Hello! Python', 1935182080, 'https://s3.amazonaws.com/AKIAJC5RLADLUMVRPFDQ.book-thumb-images/briggs.jpg', 'Learn Python the fast and fun way! Hello! Python is a fully-illustrated, project-driven tutorial designed to get you up and running with Python, no experience required. It\'s full of projects that help you learn the way most programmers do   one step at a time, starting with the basics, and then applying your new skills in useful programs.    Hello! Python fully covers the building blocks of Python programming and gives you a gentle introduction to more advanced topics such as object oriented programming, functional programming, network programming, and program design. New (or nearly new) programmers will learn most of what they need to know to start using Python immediately.    The book presents several practical projects, including games, business, and graphical applications. Each example provides a solid base for you to develop your own programs. As you dig into Python, you\'ll see how programs are created, and the reasons behind the technical decisions.    The book covers Python\'s large standard library gradually and in the context of sample apps, so the reader isn\'t overwhelmed with a large number of library functions to absorb all at once. Upon completing the book, the reader will have a good grasp of Python, know several technologies and libraries related to Python and be able to identify many resources for future growth as a programmer."'),
            5 => new Book(5, 'C++/CLI in Action', 1932394818, 'https://s3.amazonaws.com/AKIAJC5RLADLUMVRPFDQ.book-thumb-images/sivakumar.jpg', 'Developers initially welcomed Microsoft\'s Managed C++ for .NET, but the twisted syntax made it difficult to use. Its much-improved replacement, C++/CLI, now provides an effective bridge between the native and managed programming worlds. Using this technology, developers can combine existing C++ programs and .NET applications with little or no refactoring. Accessing .NET libraries like Windows Forms, WPF, and WCF from standard C++ is equally easy.    C++/CLI in Action is a practical guide that will help you breathe new life into your legacy C++ programs. The book begins with a concise C++/CLI tutorial. It then quickly moves to the key themes of native/managed code interop and mixed-mode programming. You   ll learn to take advantage of GUI frameworks like Windows Forms and WPF while keeping your native C++ business logic. The book also covers methods for accessing C# or VB.NET components and libraries. Written for readers with a working knowledge of C++."'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        $books = [];
        foreach ($this->books as $book) {
            $books[] = [
                'id' => $book->getId(),
                'title' => $book->getTitle()
            ];
        }
        return $books;
    }

    /**
     * {@inheritdoc}
     */
    public function findBookWithId(int $id): Book
    {
        if (!isset($this->books[$id])) {
            throw new BookNotFoundException();
        }

        return $this->books[$id];
    }
}
