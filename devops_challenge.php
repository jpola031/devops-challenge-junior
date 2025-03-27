<?php
/**
 * @package Devops_challenge_Junior
 * @version 1.0
 */
/*
Plugin Name: Devops challenge Júnior
Plugin URI: https://apiki.com/
Description: Sabe de nada, inocente! Ordinária!!
Author: Apiki WordPress
Version: 1.0
*/

$global_lyrics = ''; // Erro 1: variável global não estava inicializada, coloquei vazio pra corrigir

function apiki_segura_o_tchan() {
    global $global_lyrics; // Erro 2: precisa dizer que é global aqui dentro
    $lyrics = $global_lyrics;
    
   $lyrics = "Pau que nasce torto nunca se endireita\n" . // Erro 3: string ajustada para evitar quebra de linhas  forma inconsistente
              "Menina que requebra a mãe pega na cabeça\n" .
              "Pau que nasce torto nunca se endireita\n" .
              "Menina que requebra a mãe pega na cabeça\n" .
              "Domingo ela não vai (vai, vai)\n" .
              "Domingo ela não vai não (vai, vai, vai)\n" .
              "Olha, domingo ela não vai (vai, vai)\n" .
              "Domingo ela não vai não (vai, vai, vai)\n" .
              "O pau que nasce torto nunca se endireita\n" .
              "Menina que requebra a mãe pega na cabeça\n" .
              "Pau que nasce torto nunca se endireita\n" .
              "Menina que requebra a mãe pega na cabeça\n" .
              "Segure o tchan\n" .
              "Amare o tchan\n" .
              "Segure o tchan tchan tchan tchan\n" .
              "Depois de nove meses você vê o resultado\n" .
              "Esse é o Gera Samba arrebentando no pedaço\n" .
              "Joga ela no meio, mete em cima, mete embaixo";

    $lyrics = explode( "\n", $lyrics ); // Erro 4: faltava ponto e vírgula

    return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] ); // Erro 5: estava invertido o mt_rand, troquei de 0 pra cima
}

function devops_challenge() {
    $chosen = apiki_segura_o_tchan(); // Erro 7: estava usando variável errada
    $lang   = '';
    if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
        $lang = ' lang="en"';
    }

    printf(
        'O texto é: %s %s %s', // Erro 8: tinha poucos argumentos pro printf, assim mostra tudo
        __( 'Segure o Tchan, by Apiki WordPress:' ),
        $lang,
        $chosen // Coloquei o $chosen aqui pra aparecer a letra
    );
}

add_action( 'admin_notices', 'devops_challenge' ); // Erro 6: estava vazio o hook, coloquei admin_notices pra aparecer no admin

function devop_css() {
    echo "
    <style type='text/css'>
    #devops { /* Erro 9: tava devop e não devops, corrigi o nome */
        float: right;
        padding: 5px 10px;
        margin: 0;
        font-size: 12px;
        line-height: 1.6666;
    }
    .rtl #devops {
        float: left;
    }
    .block-editor-page #devops {
        display: none;
    }
    @media screen and (max-width: 782px) {
        #devops,
        .rtl #devops {
            float: none;
            padding-left: 0;
            padding-right: 0;
        }
    }
    </style>
    ";
}

add_action( 'admin_enqueue_scripts', 'devop_css' ); // Erro 10: estava admin_head, troquei pra admin_enqueue_scripts
