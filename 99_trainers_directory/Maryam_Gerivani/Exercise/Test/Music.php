<!DOCTYPE html>
<html lang="fa">
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/main.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/music.css"/>
</head>
<body id="body">
    <h1>فرم نظر سنجی</h1>
    <div id="main">
        <p>به ما بگویید چگونه می توانیم freeCodeCamp را بهبود بخشیم</p>
        <form id="survey-form" method="GET">
            <div class="row">
                <div class="label">
                    <label id="lblName">*نام:</label>
                </div>
                <div class="data">
                    <input type="text" id="name" class="input-field" name="name" placeholder="نام خود را وارد کنید" required/>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label id="lblEmail">*ایمیل:</label>
                </div>
                <div class="data">
                    <input type="text" id="email" class="input-field" name="email" placeholder="ایمیل خود را وارد کنید"/>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label id="lblAge">*سن:</label>
                </div>
                <div class="data">
                    <input type="text" id="age" class="input-field" name="age" placeholder="سن" min="1" max="125" required/>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="currentPos">کدام گزینه بهترین نقش فعلی شما را توصیف می کند؟</label>
                </div>
                    <select id="dropdown" class="dropdown" name="currentPos">
                        <option disabled selected value >انتخاب کنید</option>
                        <option id="student">دانشجو</option>
                        <option id="job">شغل تمام وقت</option>
                        <option id="learner">یادگیرنده تمام وقت</option>
                        <option id="not">ترجیح میدهم نگویم</option>
                        <option id="other">سایر</option>
                    </select>
            </div>
            <div class="row">
                <div class="label">
                    <label for="userRating">* چقدر احتمال دارد که freeCodeCamp را به یک دوست توصیه کنید؟</label>
                </div>
                <div class="data">
                    <ul>
                        <li class="radio">
                            <label>
                                <input class="userRating" type="radio" value="1" name="btnRadio"/>قطعا
                            </label>
                        </li>
                        <li class="radio">
                            <label>
                                <input class="userRating" type="radio" value="2" name="btnRadio"/>شاید
                            </label>
                        </li>
                        <li class="radio">
                            <label>
                                <input class="userRating" type="radio" value="3" name="btnRadio"/>مطمئن نیستم
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="label">چه چیزی را بیشتر در FCC دوست دارید:</div>
                <div class="data">
                    <select class="dropdown">
                        <option disabled selected value >انتخاب کنید</option>
                        <option id="challenge">چالش ها</option>
                        <option id="project">پروژه ها</option>
                        <option id="community">انجمن</option>
                        <option id="open source">متن باز</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="label">
                    <label for="prefrence">مواردی که باید در آینده بهبود یابد<br>
(تمام موارد اعمال شده را بررسی کنید):</label>
                </div>
                <div class="data">
                    <ul id="prefrence">
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="1"/>پروژه های فرانت اند
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="2"/>پروژه های بک اند
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="3"/>تجسم داده ها
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="4"/>چالش ها
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="5"/>انجمن منبع باز
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="6"/>اتاقهای کمکی بهتر
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="7"/>فیلم ها
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="8"/>جلسات شهری
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="9"/>ویکی
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="10"/>انجمن
                            </label>
                        </li>
                        <li class="checkbox">
                            <label>
                                <input class="userRating" type="checkbox" name="prefer" value="11"/>دوره های اضافی
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</body>
</html>