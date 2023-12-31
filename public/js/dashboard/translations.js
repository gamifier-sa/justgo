const translate = (word) => {

    let locale = document.querySelector('html').getAttribute('lang') || 'ar';
    if( locale === 'ar' )
        return translations[locale][word] ?? word;
    else
        return word;
}

let translations = {
    'ar': {
        "Adding car to FAV": "جاري اضافة السيارة إلى المفضلة",
        "Removing car from FAV": "جاري إزالة السيارة من المفضلة",
        "Please wait ..." : "يرجى الانتظار ...",
        "Are you sure from deleting this " : "هل انت متأكد من حذف  ",
        "Yes, Delete !" : "نعــم, أحذف !",
        "No, Cancel" : "لا , ألغي",
        "something went wrong" : "حدث خطأ ما",
        "Error !" : "خطـأ !",
        "Operation done successfully" : "تمت العملية بنجاح",
        "This action is unauthorized." : "ليس لديك صلاحية لهذا الأجراء",
        "Loading..." : "تحميل...",
        "Actions" : "الإجراءات",
        "Edit" : "تعديل",
        "Delete" : "حذف",
        "open location" : "العنوان",
        "show more" : "عرض المزيد",
        "Are you sure you want to delete this" : "هل أنت متأكد من حذف هذا ",
        "?" : "؟",
        "deleting now ..." : "يتم الحذف الآن ...",
        "You have deleted the" : "تم حذف",
        "was not deleted !" : "لم يتم الحذف !",
        "successfully !" : "بنجاح !",
        "Show" : "التفاصيل",
        "price" : "السعر",
        "Clear" : "إلغاء",
        "Apply" : "تطبيق",
        "unavailable" : "غير متاح",
        "available_on_request" : "متوفر عند الطلب",
        "Next" : "الـتالي",
        "Submit" : "حـفـظ",
        "File selected" : "ملف تم تحديده",
        "preview photos" : "معاينة الصور",
        "Delete image" : "حذف الصورة",
        "available" : "متاح",
        "Yes" : "نعم",
        "No" : "لا",
        "Processing..." : "جاري التحميل ...",
        "Custom Range" : "فترة محددة",
        "No data available in table" : "لا يوجد بيانات",
        "unavailable car" : "سيارة غير موجودة",
        "January" : "يناير",
        "February" : "فبراير",
        "March" : "مارس",
        "April" : "أبريل",
        "May" : "مايو",
        "June" : "يونيو",
        "July" : "يوليو",
        "August" : "أغسطس",
        "September" : "سبتمبر",
        "October" : "أكتوبر",
        "November" : "نوفمبر",
        "December" : "ديسمبر",
        "Orders number" : "عدد الطلبات",
        "Clients number" : "عدد العملاء",
        "Duplicate" : "تكرار",
        "branch" : "الفرع",
        "There are no images" : "لا يوجد صور",
        "city" : "المدينة",
        "client" : "العميل",
        "color" : "اللون",
        "offer" : "العرض",
        "role" : "الدور",
        "change" : "تغيير",
        "cancel" : "إلغاء",
        "Price" : "السعر",
        "SAR" : "ريال",
        "New" : "جديد",
        "Showing" : "عرض",
        "to" : "من",
        "records" : "صفوف",
        "of" : "إجمالي",
        "Showing no records" : "عدد الصفوف المعروضة",
        "Name in arabic" : "الاسم بالعربية",
        "Pick new date" : "اختر التاريخ الجديد",
        "change order status" : "تغيير حالة الطلب",
        "No results found" : "لا يوجد نتائج للعرض",
        "competitive price" : "سعر منافس",
        "All data related to this" : "جميع البيانات المرتبطة بهذه",
        "will be deleted" : "سوف يتم حذفها",
        "Restore" : "استرجاع",
        "You have restored the" : "تم استرجاع",
        "male" : "ذكر",
        "female" : "انثي",
        "patient" : "المريض",
        "home visit" : "الزيارة المنزلية",
        "package" : "عرض",
        "doctor" : "الطبيب",
        "hospital" : "المستشفي",
        "insurance company" : "شركة التأمين",
        "sector" : "قطاع",
        "Activated" : "فعــــال",
        "Not Activated" : "غير فعــال",
        "marketer_id" : "بيانات المسوق",
        "main analysis" : "التحليل الرئيسي",
        "sub analysis" : "التحليل الفرعي",
        "marketer" : "المسوق",
        "promo code" : "الكوبون",
        "nationality" : "الجنسية",
        "vacation type" : "نوع الإجابة",
        "allowance type" : "نوع البدلّة",
        "addition" : "إضافة",
        "deduction" : "المستقطع",
        "deduction / addition" : "الخصومات / الإضافات",
        "Success" : "الناجحة",
        "Discarded" : "المرتجعة",
        "Cash" : "شبكة",
        "Credit" : "نقدي",
        "Overdue" : "مؤجل",
        "Show Invoice" : "عرض الفاتورة",
        "invoices" : "الفواتير",
        "invoice" : "الفاتورة",
        "Not set" : "غير محدد",
        "Male" : "ذكر",
        "Female" : "أنثي",
        "Child" : "طفل",
        "Create Result":"انشاء نتيجة",
        "Edit Result":"تعديل نتيجة",
        "Active" : "مُفعل",
        "Inactive" : "غير مُفعل",
        "There is no finished analysis to archive" : "لا يوجد تحاليل منتهية للنقل الي المحفوظات",
        "laboratories" : "المعامل الخارجية",
        "laboratory" : "معمل خارجي",
        "the laboratory" : "المعمل خارجي",
        "Pending" : "منتظرة",
        "Finished" : "منتهية",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",
        "" : "",

    }
};


