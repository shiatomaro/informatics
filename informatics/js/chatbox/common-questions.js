const courses = `
<ol>
    <li><a href="https://informatics.edu.ph/programs/bachelors-degree-programs/">Bachelor's degree programs</a></li>
    <li><a href="https://informatics.edu.ph/programs/diploma-courses/">Diploma Courses</a></li>
    <li><a href="https://informatics.edu.ph/programs/short-courses-ict/">Corporate / Short Courses</a></li>
</ol>
`;

export const commonQuestions = [
    {
        question: "What are the courses that you offer?",
        response: "Currently, here are the courses that we offer: <br/>" + courses + "<br/><e>please follow the links for more details</e>",
        nextQuestions: [],
    },
    {
        question: "Is there an admission fee?",
        response: "Yes, there is an admission fee of ₱500.",
        nextQuestions: 
        [
            {
                question: "What are my payment options?",
                response: `
                    There are currently two (2) payment options:<br/>
                    <b>Option 1</b>: G-Cash (via bank transfer)<br/>
                    <b>Option 2</b>: Bank Deposit.
                `,
                nextQuestions: [
                    {
                        question: "How can i pay via G-Cash?",
                        response: `
                            Select bank transfer in GCash and input the following details:<br/>
                            <b>Bank</b>: Security Bank<br/>
                            <b>Account Name</b>: Informatics College Northgate<br/>
                            <b>Account No.</b>: 0851-027809001<br/>
                            <e> After making the payment, send a proof of payment <u>with reference number and date</u> to FB page <a href="https://www.facebook.com/InformaticsPH">@informaticsphilippines</a></e>
                        `,
                        nextQuestions: [],
                    },
                    {
                        question: "How can i pay via Bank Deposit?",
                        response: `
                            Make a payment using the following details:<br/>
                            <b>Bank</b>: Security Bank<br/>
                            <b>Account Name</b>: Informatics College Northgate Inc.<br/>
                            <b>Account No.</b>: 0851-027809001<br/>
                            <e> After making the payment, send a proof of payment <u>with reference number and date</u> to FB page <a href="https://www.facebook.com/InformaticsPH">@informaticsphilippines</a></e>
                        `,
                        nextQuestions: [],
                    }
                ]
            }
        ]
    },
];