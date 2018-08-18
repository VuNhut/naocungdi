document.addEventListener('DOMContentLoaded', function () {
    var policyMain = document.querySelector('.policy-main'),
        tableRecruitment = document.querySelector('.recruitment .info-recruitment'),
        recruitmentPolicy = document.querySelector('.recruitment-policy')
        careerOpportunity = document.querySelector('.career-opportunity');
    careerOpportunity.addEventListener('click', function () {
        policyMain.style.display = "none";
        tableRecruitment.style.display = "block";
        recruitmentPolicy.classList.remove('active');
        careerOpportunity.classList.add('active');
    })
    recruitmentPolicy.addEventListener('click', function () {
        tableRecruitment.style.display = "none";
        policyMain.style.display = "block";
        careerOpportunity.classList.remove('active');
        recruitmentPolicy.classList.add('active');
    })
})