function chargeFees(BookID) {
    const BorrowEndField = 'borrowend_' + BookID;
    BorrowEnd = new Date(document.getElementById(BorrowEndField).value);
    let Today = new Date();
    const CurrentDate = new Date();
    if (BorrowEnd < CurrentDate) {
        const chargeFees = confirm('Book is past return due date. Do you want to charge fee?\n - OK (Return/Enter) to CHARGE FEE\n - Cancel (Esc) to WAIVE FEE');
        const ChargeFeesField = 'chargefees_' + BookID;
        if (chargeFees) {
            document.getElementById(ChargeFeesField).value = '1';
        } else {
             document.getElementById(ChargeFeesField).value = '0';
        }
    }
    FormID = 'checkinbook_' + BookID;
    return true;
}