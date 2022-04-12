/** FUNCTIONS **/

/**
 * FUNCTION COUNTDOWN
 * @param {number} time
 * @param {string} container
 * @param {string} url
 * @returns {void}
 */
function countdown(time, container, url) {
    ntime = time;
    ncontainer = container;
    nurl = url;

    $(container).html(ntime);
    if (time < 1) {
        //window.location.replace(url);
        redirectTo(url);
    } else {
        counter = setTimeout('countdown(ntime,ncontainer,nurl)', 1000);
        ntime--;
    }
}

/**
 * FUNCTION COUNTDOWN AND SUBMIT
 * @param {number} time
 * @param {string} container
 * @param {string} target
 * @returns {void}
 */
function countdownAndSubmit(time, container, target) {
    ntime = time;
    ncontainer = container;
    ntarget = target;

    if (ntime < 1) {
        ntime = 0;
        $(ntarget).submit();
    } else {
        counter = setTimeout('countdownAndSubmit(ntime,ncontainer,ntarget)', 1000);
        ntime--;
    }
    $(container).html(ntime);
}

/**
 * FUNCTION REDIRECT TO
 * @param {string} url
 * @returns {void}
 */
function redirectTo(url) {
    window.location.replace(url);
}

/**
 * FUNCTION VALIDA FORM
 * @returns {Boolean}
 */
function validaForm() {
    var nome = $("#nome").val();
    var sobrenome = $("#sobrenome").val();
    var departamento = $("#departamento").val();
    var email = $("#email").val();
    var idMatricula = $("#idMatricula").val();
    var modelo = $("#modelo").val();
    var tamanho = $("#tamanho").val();
    var numero = $("#numero").val();
    var escritorio = $("#escritorio").val();

    if (nome === "" || sobrenome === "" || departamento === "" || email === "" || idMatricula === "" || modelo === "" || tamanho === "" || numero === "" || escritorio === "") {
        alert("O preenchimento de todos os campos é obrigatório");
        return false;
    }

    if (email !== "") {
        if (email.indexOf("@empresacompany.com") < 0 && email.indexOf("@empresa.es") < 0 && email.indexOf("@eservicios.empresa.es") < 0 && email.indexOf("@eservicios.empresacompany.com") < 0) {
            alert("Somente poderão participar funcionários da Empresa com seus respectivos emails corporativos");
            return false;
        }
    }

    if (!$("#aceite").prop('checked')) {
        alert("Para participar é necessário aceitar o regulamento.");
        return false;
    }
}

/**
 * FUNCTION CHECK IF IS FIRST VISIT
 * @returns {undefined}
 */
function checkFirstVisit() {
    if (document.cookie.indexOf('quizEmpresa') === -1) {
        document.cookie = 'quizEmpresa=1';
    }
    else {
        $(idBotaoSubmit).submit();
    }
}

/**
 * EXECUTION
 */
$(document).ready(function () {
    /** CONFIG **/
    var pagina = "1";
    var qtdPerguntas = $(".indice").length;
    var countdownStart = 10;
    var countdownQuiz = $(".time").text();
    var idBotaoSubmit = "#gravar";
    var pagParticipar = "/participe";
    var pagIniciar = "/iniciar";
    var pagQuiz = "/quiz";

    /**
     * FUNCTION SHOW OR HIDE
     * @param {string} div
     * @returns {void}
     */
    function showHide(div) {
        for (i = 1; i <= qtdPerguntas; i++) {
            $("#p" + i).hide();
        }
        $(div).show();
    }

    /**
     * FUNCTION CHECK PAGE QUIZ
     * @param {number} pagina
     * @param {number} qtdPerguntas
     * @returns {void}
     */
    function checkPageQuiz(pagina, qtdPerguntas) {
        if (pagina === qtdPerguntas) {
            showHide("#p" + pagina);
            $("#btn-next").hide();
            $("#btn-final").show();
        }
    }


    // PAGINA INICIAR
    if (window.location.pathname === pagIniciar) {
        countdown(countdownStart, "#countdown", pagQuiz);

        $("#iniciar").on("click", function () {
            redirectTo(pagQuiz);
        });
    }

    // PAGINA QUIZ
    if (window.location.pathname === pagQuiz) {
        //checkFirstVisit();
        checkPageQuiz(pagina, qtdPerguntas);
        countdownAndSubmit(countdownQuiz, ".time", idBotaoSubmit);

        showHide("#p" + pagina);

        $("#a" + pagina).addClass("active");

        for (i = 1; i <= qtdPerguntas; i++) {
            $(".indice").click(function (e) {
                //showHide("#"+this.name);
                e.preventDefault();
                //pagina = this.name;
                //pagina = pagina.substr(1);
                //console.log(pagina);
            });
        }

        $("#btn-next").on("click", function (e) {
            e.preventDefault();

            if (pagina < qtdPerguntas) {
                pagina = new Number(pagina) + 1;
                showHide("#p" + pagina);
                $("#a" + pagina).addClass("active");
            }
            checkPageQuiz(pagina, qtdPerguntas);
        });

        $("#btn-final").on("click", function (e) {
            //e.preventDefault();
            clearTimeout(counter);
        });
    }
});