# Тестовое задание на Laravel

Есть гипотетический проект биржи труда. Надо реализовать некоторые пользовательские опции.

1. Дополнить стандартную регистрацию Laravel капчей
    - Капча должна быть реализована в виде отдельного класса.
    - Капча должна быть внедрена с помощью Dependency Injection.
2. Структура БД должна быть создана с помощью миграций и должен быть создан дефольный пользователь с правами модератора
3. Функционал (после регистрации)
    - Как работодатель я хочу зайти на страницу, заполнить поля формы и опубликовать вакансию.
        - Поля - заголовок, описание, email.
        - Если я публикую вакансию первый раз, то я должен получить письмо на почту что вакансия на модерации, иначе она должна быть опубликована сразу.  
    - Как модератор я хочу получать уведомления на почту при появлении новых вакансий на модерацию.
        - Каждый раз при появлении новых вакансий на модерации, модератор должен получать email.
        - Email должен содержать заголовок, описание и ссылки на удаление, подтверждение.