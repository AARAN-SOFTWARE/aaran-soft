<?php

namespace Aaran\Web\Database\Seeders;

use Aaran\Web\Models\TestimonyItem;
use Illuminate\Database\Seeder;

class TestimonyItemSeeder extends Seeder
{

    public static function run(): void
    {
       TestimonyItem::create([
           'testimony_id'=>1,
           'icon'=>' <svg viewBox="0 0 64 64" height="64" width="64">
                         <path
                             d="M14.303866666666666 61.0512C14.303866666666666 62.82853333333333 29.050666666666665 63.93933333333334 40.848 63.05066666666666C46.3232 62.63826666666667 49.696133333333336 61.87599999999999 49.696133333333336 61.0512C49.696133333333336 59.27386666666666 34.94933333333333 58.163066666666666 23.152 59.05173333333333C17.6768 59.464133333333336 14.303866666666666 60.22626666666666 14.303866666666666 61.0512Z"
                             fill="#45413c" opacity=".15" stroke-width="1"></path><path
                         d="M59.764266666666664 49.08333333333333C59.764266666666664 52.94106666666667 47.358000000000004 56.78426666666667 32 56.78426666666667S4.235733333333333 53.13106666666667 4.235733333333333 49.08333333333333C4.235733333333333 43.135866666666665 16.642 38.31373333333333 32 38.31373333333333S59.764266666666664 43.135866666666665 59.764266666666664 49.08333333333333Z"
                         fill="#6dd627" stroke-width="1"></path><path
                         d="M32 42.90213333333333C44.83 42.90213333333333 55.599599999999995 46.29226666666666 58.756 50.909866666666666C59.318 50.456266666666664 59.67999999999999 49.800533333333334 59.764266666666664 49.08333333333333C59.764266666666664 43.135866666666665 47.358000000000004 38.31373333333333 32 38.31373333333333S4.235733333333333 43.135866666666665 4.235733333333333 49.08333333333333C4.288 49.81 4.623866666666666 50.487066666666664 5.170933333333333 50.9684C8.341866666666666 46.35066666666666 19.126133333333332 42.90213333333333 32 42.90213333333333Z"
                         fill="#9ceb60" stroke-width="1"></path><path
                         d="M59.764266666666664 49.08333333333333C59.764266666666664 52.94106666666667 47.358000000000004 56.78426666666667 32 56.78426666666667S4.235733333333333 53.13106666666667 4.235733333333333 49.08333333333333C4.235733333333333 43.135866666666665 16.642 38.31373333333333 32 38.31373333333333S59.764266666666664 43.135866666666665 59.764266666666664 49.08333333333333Z"
                         fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="1"></path><path
                         d="M24.299066666666665 40.62253333333333C24.299066666666665 42.39986666666667 30.716533333333334 43.510666666666665 35.85053333333333 42.622C38.2332 42.209599999999995 39.70093333333333 41.44733333333333 39.70093333333333 40.62253333333333C39.70093333333333 38.8452 33.28346666666666 37.734399999999994 28.1496 38.623066666666666C25.766799999999996 39.035466666666665 24.299066666666665 39.797599999999996 24.299066666666665 40.62253333333333Z"
                         fill="#46b000" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="1"></path><path
                         d="M32 1.3725333333333334H32C31.16453333333333 1.3308 30.464666666666666 1.9973333333333332 30.4656 2.8338666666666663V41.67466666666667C30.457466666666665 42.36626666666666 31.016 42.931333333333335 31.70773333333333 42.931333333333335H32.29226666666666C32.983999999999995 42.931333333333335 33.54253333333333 42.36626666666666 33.5344 41.67466666666667V2.9069333333333334C33.5788 2.041733333333333 32.8652 1.3281333333333332 32 1.3725333333333334Z"
                         fill="#daedf7" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="1"></path><path
                         d="M51.99026666666666 16.818266666666666L44.33319999999999 13.325866666666666C43.01306666666666 12.7224 42.006 11.593599999999999 41.556799999999996 10.213333333333333C41.58306666666667 8.513066666666667 40.543866666666666 6.977733333333333 38.95573333333333 6.3701333333333325L33.5344 4.3536V21.479733333333332L37.5528 20.01853333333333C38.879599999999996 19.5332 40.355599999999995 19.68413333333333 41.556799999999996 20.427599999999998H41.556799999999996C43.16173333333333 22.24053333333333 45.871199999999995 22.561066666666665 47.85493333333333 21.172933333333333L52.10719999999999 18.2504C52.64026666666667 17.983333333333334 52.6844 17.239466666666665 52.18666666666667 16.9112C52.12586666666667 16.871199999999998 52.059733333333334 16.839866666666666 51.99026666666666 16.818266666666666Z"
                         fill="#ff6242" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="1"></path><path d="M41.556799999999996 20.383866666666666V10.213333333333333"
                                                       fill="#ff6242" stroke="#45413c" stroke-linecap="round"
                                                       stroke-linejoin="round" stroke-width="1"></path></svg>',
           'title'=>'Training',
           'description'=>'Strength does not come from physical capacity. It comes from an indomitable will. '

       ]);

        TestimonyItem::create([
            'testimony_id'=>1,
            'icon'=>' <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" id="Direct-Hit--Streamline-Emoji" height="64"
                   width="64"><desc>Direct Hit Streamline Emoji: https://streamlinehq.com</desc><path
                      d="M4.279066666666666 29.103066666666667C4.279066666666666 50.440666666666665 27.37773333333333 63.77666666666667 45.85666666666666 53.107866666666666C54.43266666666666 48.1564 59.71573333333333 39.00586666666666 59.71573333333333 29.103066666666667C59.71573333333333 7.765466666666666 36.6172 -5.570533333333334 18.138266666666667 5.0982666666666665C9.562133333333332 10.0496 4.279066666666666 19.200266666666664 4.279066666666666 29.103066666666667Z"
                      fill="#ff6242" stroke-width="1"></path><path
                      d="M31.997466666666668 7.029599999999999C46.21666666666667 7.031866666666667 58.1308 17.787866666666666 59.58173333333333 31.93293333333333C59.67106666666667 30.994666666666664 59.71573333333333 30.056266666666666 59.71573333333333 29.103066666666667C59.71573333333333 7.765466666666666 36.6172 -5.570533333333334 18.138266666666667 5.0982666666666665C9.562133333333332 10.049733333333332 4.279066666666666 19.200266666666664 4.279066666666666 29.103066666666667C4.279066666666666 30.056266666666666 4.279066666666666 30.994666666666664 4.4132 31.93293333333333C5.864133333333333 17.787866666666666 17.778133333333333 7.031866666666667 31.997466666666668 7.029599999999999Z"
                      fill="#ff866e" stroke-width="1"></path><path
                      d="M4.279066666666666 29.103066666666667C4.279066666666666 50.440666666666665 27.37773333333333 63.77666666666667 45.85666666666666 53.107866666666666C54.43266666666666 48.1564 59.71573333333333 39.00586666666666 59.71573333333333 29.103066666666667C59.71573333333333 7.765466666666666 36.6172 -5.570533333333334 18.138266666666667 5.0982666666666665C9.562133333333332 10.0496 4.279066666666666 19.200266666666664 4.279066666666666 29.103066666666667Z"
                      fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="1"></path><path
                      d="M10.996399999999998 29.103066666666667C10.996399999999998 45.2696 28.497333333333334 55.37373333333333 42.498 47.29039999999999C48.995733333333334 43.53893333333333 52.998400000000004 36.605999999999995 52.998400000000004 29.103066666666667C52.998400000000004 12.936533333333333 35.4976 2.8324 21.49693333333333 10.9156C14.999199999999998 14.667066666666665 10.996399999999998 21.600133333333332 10.996399999999998 29.103066666666667Z"
                      fill="#ffffff" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="1"></path><path
                      d="M17.71373333333333 29.103066666666667C17.71373333333333 40.09866666666667 29.616799999999998 46.9708 39.13933333333333 41.47306666666667C43.55866666666666 38.92146666666666 46.28106666666666 34.20613333333333 46.28106666666666 29.103066666666667C46.28106666666666 18.107466666666667 34.378 11.235199999999999 24.8556 16.733066666666666C20.436266666666665 19.284533333333332 17.71373333333333 24 17.71373333333333 29.103066666666667Z"
                      fill="#ff6242" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="1"></path><path
                      d="M25.280133333333332 29.103066666666667C25.272799999999997 34.274 30.866 37.513866666666665 35.34786666666666 34.934666666666665C37.43386666666666 33.73426666666666 38.71813333333333 31.509733333333333 38.7148 29.103066666666667C38.721999999999994 23.932000000000002 33.1288 20.692266666666665 28.64693333333333 23.27146666666667C26.561066666666665 24.471866666666664 25.276666666666664 26.6964 25.280133333333332 29.103066666666667Z"
                      fill="#ffffff" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="1"></path><path
                      d="M53.20693333333333 49.95506666666666C52.55453333333333 50.61266666666666 51.4912 50.61266666666666 50.8388 49.95506666666666L31.237866666666665 30.294533333333334C30.578666666666667 29.63693333333333 30.578666666666667 28.569066666666664 31.237866666666665 27.911466666666662C31.890266666666665 27.253999999999998 32.953599999999994 27.253999999999998 33.605999999999995 27.911466666666662L53.20693333333333 47.5124C53.907066666666665 48.17613333333333 53.907066666666665 49.29133333333333 53.20693333333333 49.95506666666666Z"
                      fill="#00b8f0" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="1"></path><path
                      d="M41.33613333333333 35.626799999999996S51.24093333333333 33.00533333333333 56.7816 36.818266666666666C62.054133333333326 40.46746666666667 59.34346666666666 45.39746666666666 55.59 46.32093333333333C52.492 47.09533333333333 49.632266666666666 43.952666666666666 49.632266666666666 43.952666666666666Z"
                      fill="#00b8f0" stroke-width="1"></path><path
                      d="M56.7816 41.01853333333333C57.77533333333333 41.67346666666666 58.5976 42.557066666666664 59.1796 43.59519999999999C60.20733333333334 41.6292 59.90946666666666 39.022666666666666 56.7816 36.86293333333333C51.24093333333333 33.05 41.33613333333333 35.67146666666666 41.33613333333333 35.67146666666666L44.85119999999999 39.18653333333333C48.23226666666666 38.7248 53.355866666666664 38.605599999999995 56.7816 41.01853333333333Z"
                      fill="#4acfff" stroke-width="1"></path><path
                      d="M41.33613333333333 35.626799999999996S51.24093333333333 33.00533333333333 56.7816 36.818266666666666C62.054133333333326 40.46746666666667 59.34346666666666 45.39746666666666 55.59 46.32093333333333C52.492 47.09533333333333 49.632266666666666 43.952666666666666 49.632266666666666 43.952666666666666Z"
                      fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="1"></path><path
                      d="M38.967999999999996 38.03959999999999S36.346533333333326 47.9444 40.15946666666666 53.48506666666666C43.793733333333336 58.7576 48.73866666666667 56.046933333333335 49.66213333333333 52.29346666666667C50.43666666666667 49.18053333333333 47.29386666666666 46.33573333333334 47.29386666666666 46.33573333333334Z"
                      fill="#00b8f0" stroke-width="1"></path><path
                      d="M49.170533333333324 53.58933333333333C49.3868 53.17906666666667 49.55186666666666 52.74386666666666 49.66213333333333 52.29346666666667C50.43666666666667 49.18066666666667 47.29386666666666 46.33573333333334 47.29386666666666 46.33573333333334L38.967999999999996 38.03959999999999C38.605333333333334 39.55373333333333 38.35146666666667 41.09173333333333 38.2084 42.641999999999996Z"
                      fill="#009fd9" stroke-width="1"></path><path
                      d="M38.967999999999996 38.03959999999999S36.346533333333326 47.9444 40.15946666666666 53.48506666666666C43.793733333333336 58.7576 48.73866666666667 56.046933333333335 49.66213333333333 52.29346666666667C50.43666666666667 49.18053333333333 47.29386666666666 46.33573333333334 47.29386666666666 46.33573333333334Z"
                      fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="1"></path><path
                      d="M12.679466666666666 60.8428C12.679466666666666 62.78053333333333 28.777733333333334 63.99159999999999 41.6564 63.0228C47.63346666666666 62.57306666666666 51.31533333333333 61.742133333333335 51.31533333333333 60.8428C51.31533333333333 58.905199999999994 35.21706666666667 57.69413333333333 22.338533333333334 58.66293333333333C16.361466666666665 59.11253333333333 12.679466666666666 59.9436 12.679466666666666 60.8428Z"
                      fill="#45413c" opacity=".15" stroke-width="1"></path></svg>',
            'title'=>'Group Sessions ',
            'description'=>'Whatever the mind can conceive and believe, the mind can achieve. Immerse yourself in a professional environment and develop your skills.  '

        ]);

        TestimonyItem::create([
            'testimony_id'=>1,
            'icon'=>'<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" id="Game-Dice--Streamline-Emoji"
                             height="64" width="64"><desc>Game Dice Streamline Emoji: https://streamlinehq.com</desc><path
                                d="M9.5396 60.42906666666667C9.5396 62.68533333333333 28.25653333333333 64.09546666666665 43.230266666666665 62.96733333333333C50.17946666666666 62.44373333333333 54.4604 61.47613333333334 54.4604 60.42906666666667C54.4604 58.1728 35.74346666666666 56.76266666666667 20.76973333333333 57.8908C13.820533333333332 58.4144 9.5396 59.38199999999999 9.5396 60.42906666666667Z"
                                fill="#45413c" opacity=".15" stroke-width="1"></path><path
                                d="M32 24.18133333333333V59.6216C33.20666666666666 59.61919999999999 34.40266666666666 59.39613333333333 35.529066666666665 58.9636L58.5428 49.99146666666667C60.79466666666666 49.11626666666667 62.278933333333335 46.9492 62.2812 44.53333333333333V16.48013333333333C62.27813333333333 15.197866666666666 61.852399999999996 13.952266666666667 61.07 12.936133333333332Z"
                                fill="#daedf7" stroke-width="1"></path><path
                                d="M2.9299999999999997 12.936133333333332C2.1475999999999997 13.952266666666667 1.7218666666666667 15.197866666666666 1.7187999999999999 16.48013333333333V44.593066666666665C1.7210666666666665 47.00906666666666 3.205333333333333 49.17613333333333 5.4572 50.0512L28.470933333333335 59.023466666666664C29.6012 59.4356 30.797066666666666 59.63826666666667 32 59.6216V24.18133333333333Z"
                                fill="#daedf7" stroke-width="1"></path><path
                                d="M32 24.18133333333333V59.6216C33.20666666666666 59.61919999999999 34.40266666666666 59.39613333333333 35.529066666666665 58.9636L58.5428 49.99146666666667C60.79466666666666 49.11626666666667 62.278933333333335 46.9492 62.2812 44.53333333333333V16.48013333333333C62.27813333333333 15.197866666666666 61.852399999999996 13.952266666666667 61.07 12.936133333333332Z"
                                fill="#ffffff" stroke-width="1"></path><path
                                d="M2.9299999999999997 12.936133333333332C2.1475999999999997 13.952266666666667 1.7218666666666667 15.197866666666666 1.7187999999999999 16.48013333333333V44.593066666666665C1.7210666666666665 47.00906666666666 3.205333333333333 49.17613333333333 5.4572 50.0512L28.470933333333335 59.023466666666664C29.6012 59.4356 30.797066666666666 59.63826666666667 32 59.6216V24.18133333333333Z"
                                fill="#ffffff" stroke-width="1"></path><path
                                d="M58.5428 44.5184L35.529066666666665 53.49053333333333C34.398799999999994 53.90266666666666 33.202933333333334 54.10546666666666 32 54.08866666666666V59.6216C33.20666666666666 59.61919999999999 34.40266666666666 59.39613333333333 35.529066666666665 58.9636L58.5428 49.99146666666667C60.79466666666666 49.11626666666667 62.278933333333335 46.9492 62.2812 44.53333333333333V39.04533333333333C62.27666666666667 41.46413333333333 60.794266666666665 43.6344 58.5428 44.5184Z"
                                fill="#daedf7" stroke-width="1"></path><path
                                d="M5.4572 44.5184C3.2057333333333333 43.6344 1.7233333333333332 41.46413333333333 1.7187999999999999 39.04533333333333V44.593066666666665C1.7210666666666665 47.00906666666666 3.205333333333333 49.175999999999995 5.4572 50.0512L28.470933333333335 59.023466666666664C29.6012 59.4356 30.797066666666666 59.63826666666667 32 59.6216V54.08866666666666C30.79333333333333 54.08626666666667 29.59733333333333 53.86333333333333 28.470933333333335 53.43079999999999Z"
                                fill="#daedf7" stroke-width="1"></path><path
                                d="M32 24.18133333333333V59.6216C33.20666666666666 59.61919999999999 34.40266666666666 59.39613333333333 35.529066666666665 58.9636L58.5428 49.99146666666667C60.79466666666666 49.11626666666667 62.278933333333335 46.9492 62.2812 44.53333333333333V16.48013333333333C62.27813333333333 15.197866666666666 61.852399999999996 13.952266666666667 61.07 12.936133333333332Z"
                                fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M2.9299999999999997 12.936133333333332C2.1475999999999997 13.952266666666667 1.7218666666666667 15.197866666666666 1.7187999999999999 16.48013333333333V44.593066666666665C1.7210666666666665 47.00906666666666 3.205333333333333 49.17613333333333 5.4572 50.0512L28.470933333333335 59.023466666666664C29.6012 59.4356 30.797066666666666 59.63826666666667 32 59.6216V24.18133333333333Z"
                                fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M32 24.18133333333333L61.07 12.936133333333332C60.41506666666667 12.0824 59.542 11.421199999999999 58.5428 11.022133333333333L35.529066666666665 2.0498666666666665C33.2592 1.1669333333333332 30.740799999999997 1.1669333333333332 28.470933333333335 2.0498666666666665L5.4572 11.022133333333333C4.456266666666666 11.425333333333334 3.582933333333333 12.091866666666665 2.9299999999999997 12.951066666666666Z"
                                fill="#ffffff" stroke-width="1"></path><path
                                d="M58.5428 11.022133333333333L56.62866666666666 10.289333333333332L34.99079999999999 18.633466666666664C33.038799999999995 19.395866666666667 30.871466666666667 19.395866666666667 28.919599999999996 18.633466666666664L7.371333333333333 10.2744L5.4572 11.022133333333333C4.456266666666666 11.425333333333334 3.582933333333333 12.091866666666665 2.9299999999999997 12.951066666666666L32 24.18133333333333L61.07 12.936133333333332C60.41506666666667 12.0824 59.542 11.421199999999999 58.5428 11.022133333333333Z"
                                fill="#daedf7" stroke-width="1"></path><path
                                d="M32 24.18133333333333L61.07 12.936133333333332C60.41506666666667 12.0824 59.542 11.421199999999999 58.5428 11.022133333333333L35.529066666666665 2.0498666666666665C33.2592 1.1669333333333332 30.740799999999997 1.1669333333333332 28.470933333333335 2.0498666666666665L5.4572 11.022133333333333C4.456266666666666 11.425333333333334 3.582933333333333 12.091866666666665 2.9299999999999997 12.951066666666666Z"
                                fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M25.166133333333335 12.352933333333333C25.1588 14.609199999999998 30.849066666666666 16.022799999999997 35.40866666666666 14.897333333333332C37.53066666666666 14.3736 38.837199999999996 13.403066666666668 38.833866666666665 12.352933333333333C38.8412 10.0968 33.15093333333333 8.6832 28.59133333333333 9.808533333333333C26.46933333333333 10.3324 25.162799999999997 11.302933333333332 25.166133333333335 12.352933333333333Z"
                                fill="#ff6242" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M13.412533333333332 29.08613333333333C13.756533333333332 31.49373333333333 12.964 33.572266666666664 11.633066666666666 33.79653333333333S8.9264 32.196533333333335 8.642399999999999 29.788933333333333S9.090933333333332 25.302933333333332 10.421866666666666 25.093466666666664S13.068666666666667 26.693599999999996 13.412533333333332 29.08613333333333Z"
                                fill="#656769" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M53.45853333333333 24.18133333333333C53.114666666666665 26.573866666666664 53.907199999999996 28.667466666666662 55.25293333333333 28.876799999999996S57.94466666666666 27.276799999999998 58.24373333333333 24.8692S57.79506666666666 20.383066666666664 56.46426666666666 20.17373333333333S53.80239999999999 21.773733333333332 53.45853333333333 24.18133333333333Z"
                                fill="#656769" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M36.964666666666666 47.61373333333333C36.620666666666665 50.02133333333333 37.413199999999996 52.099866666666664 38.75906666666666 52.32413333333333S41.45066666666666 50.724133333333334 41.74973333333333 48.31653333333333S41.301199999999994 43.830533333333335 39.97026666666666 43.621199999999995S37.30853333333333 45.221199999999996 36.964666666666666 47.61373333333333Z"
                                fill="#656769" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M45.63773333333333 35.9648C45.29386666666666 38.35746666666667 46.10133333333333 40.45093333333333 47.43226666666666 40.660266666666665S50.123866666666665 39.060266666666664 50.42293333333333 36.66759999999999S49.959333333333326 32.181599999999996 48.62853333333334 31.9572S45.99666666666667 33.55733333333333 45.63773333333333 35.9648Z"
                                fill="#656769" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M22.265199999999997 42.79866666666666C22.609066666666667 45.206266666666664 21.816533333333332 47.2848 20.470666666666666 47.49413333333334S17.779066666666665 45.89413333333333 17.479999999999997 43.501466666666666S17.928533333333334 39.01533333333333 19.259466666666665 38.791066666666666S21.9212 40.39106666666666 22.265199999999997 42.79866666666666Z"
                                fill="#656769" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path></svg>',
            'title'=>'Specialty Programs ',
            'description'=>'Staying ahead by learning from time to time can help you advance in your career, innovate, create groundbreaking solutions, and stay relevant. However, this can come with many challenges.  '

        ]);

        TestimonyItem::create([
            'testimony_id'=>1,
            'icon'=>'<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" id="Calendar--Streamline-Emoji"
                             height="64" width="64"><desc>Calendar Streamline Emoji: https://streamlinehq.com</desc><path
                                d="M6.102266666666666 60.93066666666667C6.102266666666666 62.800799999999995 27.68373333333333 63.9696 44.94893333333333 63.03453333333333C52.96173333333333 62.60053333333333 57.89773333333333 61.79866666666666 57.89773333333333 60.93066666666667C57.89773333333333 59.06066666666666 36.316266666666664 57.891866666666665 19.051066666666664 58.82693333333333C11.038266666666667 59.260799999999996 6.102266666666666 60.062799999999996 6.102266666666666 60.93066666666667Z"
                                fill="#45413c" opacity=".15" stroke-width="1"></path><path
                                d="M9.341333333333333 48.342533333333336H54.65866666666666H54.65866666666666V54.82066666666666C54.65866666666666 57.504 52.483466666666665 59.679199999999994 49.80013333333333 59.679199999999994H14.199866666666667C11.516533333333332 59.679199999999994 9.341333333333333 57.504 9.341333333333333 54.82066666666666V48.342533333333336H9.341333333333333Z"
                                fill="#bdbec0" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M9.341333333333333 45.10346666666666H54.65866666666666H54.65866666666666V51.581599999999995C54.65866666666666 54.26493333333333 52.483466666666665 56.440133333333335 49.80013333333333 56.440133333333335H14.199866666666667C11.516533333333332 56.440133333333335 9.341333333333333 54.26493333333333 9.341333333333333 51.581599999999995V45.10346666666666H9.341333333333333Z"
                                fill="#bdbec0" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M9.341333333333333 19.190933333333334H54.65866666666666H54.65866666666666V48.342533333333336C54.65866666666666 51.02586666666666 52.483466666666665 53.20106666666666 49.80013333333333 53.20106666666666H14.199866666666667C11.516533333333332 53.20106666666666 9.341333333333333 51.02586666666666 9.341333333333333 48.342533333333336V19.190933333333334H9.341333333333333Z"
                                fill="#ffffff" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M14.199866666666667 5.4544H49.80013333333333C52.48333333333333 5.454533333333334 54.65866666666666 7.629733333333332 54.65866666666666 10.313066666666666V19.1468H9.341333333333333V10.357199999999999C9.316799999999999 7.656666666666666 11.499199999999998 5.454266666666666 14.199866666666667 5.4544Z"
                                fill="#ff6242" stroke-width="1"></path><path
                                d="M49.80013333333333 5.4544H14.199866666666667C11.495733333333334 5.446 9.308399999999999 7.653199999999999 9.341333333333333 10.357199999999999V14.406C9.333066666666666 11.719333333333333 11.5132 9.5392 14.199866666666667 9.547466666666665H49.80013333333333C52.486799999999995 9.5392 54.66693333333333 11.719333333333333 54.65866666666666 14.406V10.357199999999999C54.6916 7.653199999999999 52.504266666666666 5.446 49.80013333333333 5.4544Z"
                                fill="#ff866e" stroke-width="1"></path><path
                                d="M14.199866666666667 5.4544H49.80013333333333C52.48333333333333 5.454533333333334 54.65866666666666 7.629733333333332 54.65866666666666 10.313066666666666V19.1468H54.65866666666666H9.341333333333333H9.341333333333333V10.357199999999999C9.316799999999999 7.656666666666666 11.499199999999998 5.454266666666666 14.199866666666667 5.4544Z"
                                fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M19.043733333333332 9.5032C18.152666666666665 9.4952 17.432266666666663 8.774799999999999 17.424266666666664 7.883733333333333V2.995733333333333C17.424266666666664 2.1012 18.14933333333333 1.3761333333333332 19.043733333333332 1.3761333333333332C19.938133333333333 1.3761333333333332 20.663333333333334 2.1013333333333333 20.663333333333334 2.995733333333333V7.854266666666666C20.67973333333333 8.760133333333332 19.949866666666665 9.503333333333334 19.043733333333332 9.5032Z"
                                fill="#e8f4fa" stroke-width="1"></path><path
                                d="M32 9.5032C31.1056 9.5032 30.380533333333332 8.778133333333333 30.380533333333332 7.883733333333333V2.995733333333333C30.39653333333333 2.1128 31.116933333333336 1.4054666666666666 32 1.4056C32.883066666666664 1.4054666666666666 33.60346666666666 2.1128 33.6196 2.995733333333333V7.854266666666666C33.635999999999996 8.760133333333332 32.90613333333333 9.503333333333334 32 9.5032Z"
                                fill="#e8f4fa" stroke-width="1"></path><path
                                d="M44.956266666666664 9.5032C44.061733333333336 9.5032 43.33666666666666 8.778133333333333 43.33666666666666 7.883733333333333V2.995733333333333C43.33666666666666 2.1013333333333333 44.06186666666666 1.3761333333333332 44.956266666666664 1.3761333333333332C45.85066666666666 1.3761333333333332 46.57573333333333 2.1013333333333333 46.57573333333333 2.995733333333333V7.854266666666666C46.584 8.756799999999998 45.8588 9.4952 44.956266666666664 9.5032Z"
                                fill="#e8f4fa" stroke-width="1"></path><path
                                d="M19.043733333333332 1.4056C18.160666666666664 1.4054666666666666 17.440266666666666 2.1128 17.424266666666664 2.995733333333333V5.4544C17.424266666666664 4.2077333333333335 18.773866666666663 3.428533333333333 19.853466666666666 4.051866666666666C20.354666666666667 4.3412 20.663333333333334 4.875866666666666 20.663333333333334 5.4544V2.995733333333333C20.647199999999998 2.1128 19.9268 1.4054666666666666 19.043733333333332 1.4056Z"
                                fill="#ffffff" stroke-width="1"></path><path
                                d="M32 1.4056C31.116933333333336 1.4054666666666666 30.39653333333333 2.1128 30.380533333333332 2.995733333333333V5.4544C30.380533333333332 4.2077333333333335 31.73013333333333 3.428533333333333 32.80973333333333 4.051866666666666C33.3108 4.3412 33.6196 4.875866666666666 33.6196 5.4544V2.995733333333333C33.60346666666666 2.1128 32.883066666666664 1.4054666666666666 32 1.4056Z"
                                fill="#ffffff" stroke-width="1"></path><path
                                d="M44.956266666666664 1.4056C44.0732 1.4054666666666666 43.3528 2.1128 43.33666666666666 2.995733333333333V5.4544C43.33666666666666 4.2077333333333335 44.68626666666666 3.428533333333333 45.766 4.051866666666666C46.267066666666665 4.3412 46.57573333333333 4.875866666666666 46.57573333333333 5.4544V2.995733333333333C46.559733333333334 2.1128 45.83933333333333 1.4054666666666666 44.956266666666664 1.4056Z"
                                fill="#ffffff" stroke-width="1"></path><path
                                d="M19.043733333333332 9.5032H19.043733333333332C18.152666666666665 9.4952 17.432266666666663 8.774799999999999 17.424266666666664 7.883733333333333V2.995733333333333C17.424266666666664 2.1012 18.14933333333333 1.3761333333333332 19.043733333333332 1.3761333333333332H19.043733333333332C19.938133333333333 1.3761333333333332 20.663333333333334 2.1013333333333333 20.663333333333334 2.995733333333333V7.854266666666666C20.67973333333333 8.760133333333332 19.949866666666665 9.503333333333334 19.043733333333332 9.5032Z"
                                fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M32 9.5032H32C31.1056 9.5032 30.380533333333332 8.778133333333333 30.380533333333332 7.883733333333333V2.995733333333333C30.39653333333333 2.1128 31.116933333333336 1.4054666666666666 32 1.4056H32C32.883066666666664 1.4054666666666666 33.60346666666666 2.1128 33.6196 2.995733333333333V7.854266666666666C33.635999999999996 8.760133333333332 32.90613333333333 9.503333333333334 32 9.5032Z"
                                fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M44.956266666666664 9.5032H44.956266666666664C44.061733333333336 9.5032 43.33666666666666 8.778133333333333 43.33666666666666 7.883733333333333V2.995733333333333C43.33666666666666 2.1013333333333333 44.06186666666666 1.3761333333333332 44.956266666666664 1.3761333333333332H44.956266666666664C45.85066666666666 1.3761333333333332 46.57573333333333 2.1013333333333333 46.57573333333333 2.995733333333333V7.854266666666666C46.584 8.756799999999998 45.8588 9.4952 44.956266666666664 9.5032Z"
                                fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1"></path><path
                                d="M23.077866666666665 43.05693333333333V29.806266666666666H21.517199999999995C21.0056 29.845333333333333 20.5048 29.644 20.162666666666667 29.261466666666667C19.859066666666664 28.898933333333332 19.696933333333334 28.438666666666666 19.706266666666664 27.965866666666663C19.6744 27.443599999999996 19.861066666666666 26.931599999999996 20.2216 26.552533333333333C20.56093333333333 26.18373333333333 21.04613333333333 25.984266666666663 21.546666666666667 26.007733333333334H25.31573333333333C25.806 25.98506666666667 26.282666666666664 26.1724 26.626133333333332 26.523066666666665C26.9484 26.904666666666664 27.11653333333333 27.393066666666662 27.0972 27.892266666666664V43.05693333333333C27.112933333333334 43.602399999999996 26.911733333333334 44.13186666666667 26.537733333333335 44.52933333333333C26.141066666666664 44.90133333333333 25.608266666666665 45.093199999999996 25.065466666666666 45.05933333333333C24.519866666666665 45.0928 23.985466666666667 44.895066666666665 23.5932 44.51453333333333C23.2332 44.117333333333335 23.047599999999996 43.59226666666667 23.077866666666665 43.05693333333333Z"
                                fill="#45413c" stroke-width="1"></path><path
                                d="M31.411066666666663 42.306133333333335L38.051199999999994 29.732666666666663H31.234399999999997C30.690533333333335 29.773866666666667 30.154933333333332 29.581066666666665 29.76213333333333 29.202666666666666C28.758399999999998 28.2028 29.213466666666665 26.491333333333333 30.5812 26.122C30.793866666666666 26.064666666666668 31.015066666666662 26.04586666666667 31.234399999999997 26.066666666666666H40.833866666666665C41.40053333333333 26.011866666666666 41.955999999999996 26.250666666666664 42.306133333333335 26.69973333333333C42.605333333333334 27.0612 42.776266666666665 27.5116 42.792 27.980666666666664C42.792133333333325 28.2444 42.73693333333333 28.505200000000002 42.629999999999995 28.746266666666664C42.50066666666666 29.0828 42.3532 29.412 42.188266666666664 29.732666666666663L35.5924 43.11586666666666C35.395466666666664 43.550799999999995 35.164 43.969333333333324 34.9004 44.367333333333335C34.7492 44.605199999999996 34.542 44.80239999999999 34.2968 44.9416C33.43946666666666 45.28639999999999 32.4612 45.12146666666666 31.7644 44.51453333333333C31.399866666666668 44.19173333333333 31.182133333333333 43.73479999999999 31.1608 43.248400000000004C31.168799999999997 42.91893333333333 31.25453333333333 42.59613333333333 31.411066666666663 42.306133333333335Z"
                                fill="#45413c" stroke-width="1"></path></svg>',
            'title'=>' Online Coaching',
            'description'=>'During the school year, we offer a variety of different types of structured classes. Classes run in consecutive 5-week sessions.'

        ]);

    }
}

