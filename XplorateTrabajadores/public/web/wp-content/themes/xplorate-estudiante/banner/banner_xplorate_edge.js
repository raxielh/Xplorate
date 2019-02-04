/*jslint */
/*global AdobeEdge: false, window: false, document: false, console:false, alert: false */
(function (compId) {

    "use strict";
    var im='images/',
        aud='media/',
        vid='media/',
        js='js/',
        fonts = {
        },
        opts = {
            'gAudioPreloadPreference': 'auto',
            'gVideoPreloadPreference': 'auto'
        },
        resources = [
        ],
        scripts = [
        ],
        symbols = {
            "stage": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "width",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'Rectangle',
                            type: 'rect',
                            rect: ['0px', '0px', '1200px', '500px', 'auto', 'auto'],
                            fill: ["rgba(230,228,226,1.00)"],
                            stroke: [0,"rgb(0, 0, 0)","none"]
                        },
                        {
                            id: 'Rectangle2',
                            type: 'rect',
                            rect: ['0px', '-381px', '1205px', '380px', 'auto', 'auto'],
                            fill: ["rgba(199,124,54,1.00)"],
                            stroke: [0,"rgb(0, 0, 0)","none"]
                        },
                        {
                            id: 'Rectangle2Copy',
                            type: 'rect',
                            rect: ['0px', '-1px', '1205px', '380px', 'auto', 'auto'],
                            fill: ["rgba(199,54,54,1.00)"],
                            stroke: [0,"rgb(0, 0, 0)","none"]
                        },
                        {
                            id: 'Recurso_2',
                            type: 'image',
                            rect: ['1219px', '24px', '120px', '475px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"Recurso%202.png",'0px','0px']
                        },
                        {
                            id: 'Text',
                            type: 'text',
                            rect: ['1207px', '90px', '434px', '285px', 'auto', 'auto'],
                            text: "<p style=\"margin: 0px;\">​ <span style=\"font-size: 80px;\">¿te</span></p><p style=\"margin: 0px;\"><span style=\"font-weight: 900;\">conoces</span></p><p style=\"margin: 0px;\">&nbsp; &nbsp; &nbsp;bien?</p>",
                            font: ['Trebuchet MS, Arial, Helvetica, sans-serif', [105, "px"], "rgba(255,255,255,1.00)", "normal", "none", "", "break-word", "normal"],
                            textStyle: ["", "", "80px", "", ""]
                        },
                        {
                            id: 'Symbol_1',
                            symbolName: 'Symbol_1',
                            type: 'rect',
                            rect: ['-546', '0', '548', '501', 'auto', 'auto']
                        },
                        {
                            id: 'TextCopy',
                            type: 'text',
                            rect: ['1240px', '278px', '509px', '194px', 'auto', 'auto'],
                            text: "<p style=\"margin: 0px;\"><span style=\"color: rgb(233, 30, 49); font-size: 50px; font-weight: 800;\">hoy la ciencia</span></p><p style=\"margin: 0px;\"><span style=\"color: rgb(233, 30, 49);\">​</span><span style=\"color: rgb(233, 30, 49); font-weight: 100; font-size: 90px;\">te permite</span></p><p style=\"margin: 0px;\"><span style=\"color: rgb(233, 30, 49); font-weight: 100; font-size: 90px;\">​</span><span style=\"color: rgb(233, 30, 49); font-size: 50px; font-weight: 900;\">conocer como estas</span></p>",
                            font: ['Trebuchet MS, Arial, Helvetica, sans-serif', [105, "px"], "rgba(255,255,255,1.00)", "normal", "none", "", "break-word", "normal"],
                            textStyle: ["", "", "50px", "", ""]
                        },
                        {
                            id: 'TextCopy2',
                            type: 'text',
                            rect: ['-401px', '192px', '509px', '194px', 'auto', 'auto'],
                            text: "<p style=\"margin: 0px; color: rgb(233, 30, 49); font-size: 50px; font-weight: 800;\"><span style=\"color: rgb(247, 240, 241); font-weight: 100; font-size: 40px;\">En las distintas</span></p><p style=\"margin: 0px; color: rgb(233, 30, 49); font-size: 50px; font-weight: 800;\"><span style=\"color: rgb(247, 240, 241);\">​áreas de tu vida</span></p>",
                            font: ['Trebuchet MS, Arial, Helvetica, sans-serif', [105, "px"], "rgba(255,255,255,1.00)", "normal", "none", "", "break-word", "normal"],
                            textStyle: ["", "", "50px", "", ""]
                        },
                        {
                            id: 'Symbol_4',
                            symbolName: 'Symbol_4',
                            type: 'rect',
                            rect: ['557', '53', '90', '435', 'auto', 'auto']
                        },
                        {
                            id: '_001fw',
                            type: 'image',
                            rect: ['-182px', '18px', '170px', '170px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"001.fw.png",'0px','0px']
                        },
                        {
                            id: '_002fw',
                            type: 'image',
                            rect: ['-182px', '309px', '170px', '170px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"002.fw.png",'0px','0px']
                        },
                        {
                            id: '_003fw',
                            type: 'image',
                            rect: ['1212px', '309px', '170px', '170px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"003.fw.png",'0px','0px']
                        },
                        {
                            id: '_004fw',
                            type: 'image',
                            rect: ['1236px', '177px', '170px', '170px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"004.fw.png",'0px','0px']
                        },
                        {
                            id: '_005fw',
                            type: 'image',
                            rect: ['1210px', '18px', '170px', '170px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"005.fw.png",'0px','0px']
                        },
                        {
                            id: 'Text5',
                            type: 'text',
                            rect: ['285px', '78px', 'auto', 'auto', 'auto', 'auto'],
                            opacity: '0',
                            text: "<p style=\"margin: 0px;\">​Emociones</p>",
                            align: "left",
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [30, "px"], "rgba(237,225,225,1.00)", "100", "none", "normal", "break-word", "nowrap"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'Text5Copy3',
                            type: 'text',
                            rect: ['789px', '79px', 'auto', 'auto', 'auto', 'auto'],
                            text: "<p style=\"margin: 0px;\">​Salud</p>",
                            align: "left",
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [30, "px"], "rgba(237,225,225,1.00)", "100", "none", "normal", "break-word", "nowrap"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'Text5Copy4',
                            type: 'text',
                            rect: ['834px', '239px', 'auto', 'auto', 'auto', 'auto'],
                            text: "<p style=\"margin: 0px;\">​Significado</p>",
                            align: "left",
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [30, "px"], "rgba(237,225,225,1.00)", "100", "none", "normal", "break-word", "nowrap"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'Text5Copy',
                            type: 'text',
                            rect: ['288px', '380px', 'auto', 'auto', 'auto', 'auto'],
                            text: "<p style=\"margin: 0px;\">​Economía</p>",
                            align: "left",
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [30, "px"], "rgba(78,78,78,1.00)", "100", "none", "normal", "break-word", "nowrap"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'Text5Copy2',
                            type: 'text',
                            rect: ['701px', '380px', 'auto', 'auto', 'auto', 'auto'],
                            text: "<p style=\"margin: 0px;\">​Relaciones</p>",
                            align: "left",
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [30, "px"], "rgba(78,78,78,1.00)", "100", "none", "normal", "break-word", "nowrap"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'Rectangle3',
                            type: 'rect',
                            rect: ['0px', '-1px', '1205px', '509px', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(3,3,3,0.81)"],
                            stroke: [0,"rgb(0, 0, 0)","none"],
                            filter: [0, 0, 1, 1, 0, 0, 0, 0, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'Text6',
                            type: 'text',
                            rect: ['301px', '26px', '592px', '106px', 'auto', 'auto'],
                            opacity: '0',
                            text: "<p style=\"margin: 0px;\">​Haz click</p>",
                            align: "center",
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [127, "px"], "rgba(251,251,251,1.00)", "100", "none", "normal", "break-word", "normal"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'Text6Copy',
                            type: 'text',
                            rect: ['79px', '379px', '1046px', '65px', 'auto', 'auto'],
                            opacity: '0',
                            text: "<p style=\"margin: 0px;\">​para hacer el test y conocerte mejor</p>",
                            align: "center",
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [50, "px"], "rgba(255,255,255,1.00)", "100", "none", "normal", "break-word", "normal"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'Text6Copy2',
                            type: 'text',
                            rect: ['460px', '189px', '296px', '170px', 'auto', 'auto'],
                            opacity: '0',
                            text: "<p style=\"margin: 0px;\">​aqui</p>",
                            align: "center",
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [120, "px"], "rgba(249,93,0,1.00)", "100", "none", "normal", "break-word", "normal"],
                            textStyle: ["", "", "", "", "none"]
                        },
                        {
                            id: 'Rectangle4',
                            type: 'rect',
                            rect: ['424px', '173px', '342px', '194px', 'auto', 'auto'],
                            cursor: 'pointer',
                            opacity: '0',
                            fill: ["rgba(3,3,3,0.00)"],
                            stroke: [5,"rgba(255,255,255,0.60)","dotted"]
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: ['null', 'null', '1200px', '500px', 'auto', 'auto'],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,1)"]
                        }
                    }
                },
                timeline: {
                    duration: 25000,
                    autoPlay: true,
                    data: [
                        [
                            "eid114",
                            "left",
                            5584,
                            1009,
                            "easeOutQuad",
                            "${TextCopy}",
                            '1230px',
                            '670px'
                        ],
                        [
                            "eid117",
                            "left",
                            8000,
                            750,
                            "easeOutQuad",
                            "${TextCopy}",
                            '670px',
                            '1240px'
                        ],
                        [
                            "eid126",
                            "top",
                            8500,
                            987,
                            "easeOutQuad",
                            "${Rectangle2Copy}",
                            '-381px',
                            '-1px'
                        ],
                        [
                            "eid418",
                            "opacity",
                            18500,
                            872,
                            "easeOutQuad",
                            "${Rectangle3}",
                            '0',
                            '1'
                        ],
                        [
                            "eid124",
                            "left",
                            8500,
                            0,
                            "easeOutQuad",
                            "${Rectangle2Copy}",
                            '0px',
                            '0px'
                        ],
                        [
                            "eid490",
                            "left",
                            20425,
                            0,
                            "easeOutQuad",
                            "${Rectangle4}",
                            '424px',
                            '424px'
                        ],
                        [
                            "eid537",
                            "left",
                            21750,
                            0,
                            "easeOutQuad",
                            "${Rectangle4}",
                            '424px',
                            '424px'
                        ],
                        [
                            "eid542",
                            "left",
                            23250,
                            0,
                            "easeOutQuad",
                            "${Rectangle4}",
                            '424px',
                            '424px'
                        ],
                        [
                            "eid555",
                            "left",
                            25000,
                            0,
                            "easeOutQuad",
                            "${Rectangle4}",
                            '424px',
                            '424px'
                        ],
                        [
                            "eid580",
                            "top",
                            11500,
                            166,
                            "easeOutQuad",
                            "${TextCopy2}",
                            '192px',
                            '189px'
                        ],
                        [
                            "eid11",
                            "left",
                            0,
                            1794,
                            "easeInOutQuad",
                            "${Recurso_2}",
                            '540px',
                            '789px'
                        ],
                        [
                            "eid36",
                            "left",
                            3500,
                            425,
                            "easeOutQuad",
                            "${Recurso_2}",
                            '789px',
                            '1219px'
                        ],
                        [
                            "eid470",
                            "opacity",
                            20000,
                            836,
                            "easeOutQuad",
                            "${Rectangle4}",
                            '0',
                            '1'
                        ],
                        [
                            "eid557",
                            "opacity",
                            21750,
                            851,
                            "easeOutQuad",
                            "${Rectangle4}",
                            '1',
                            '0.46'
                        ],
                        [
                            "eid559",
                            "opacity",
                            22601,
                            717,
                            "easeOutQuad",
                            "${Rectangle4}",
                            '0.46000000834465027',
                            '1'
                        ],
                        [
                            "eid561",
                            "opacity",
                            23318,
                            748,
                            "easeOutQuad",
                            "${Rectangle4}",
                            '1',
                            '0.41'
                        ],
                        [
                            "eid563",
                            "opacity",
                            24066,
                            934,
                            "easeOutQuad",
                            "${Rectangle4}",
                            '0.4099999964237213',
                            '1'
                        ],
                        [
                            "eid440",
                            "background-color",
                            19372,
                            0,
                            "easeOutQuad",
                            "${Rectangle3}",
                            'rgba(3,3,3,0.81)',
                            'rgba(3,3,3,0.81)'
                        ],
                        [
                            "eid487",
                            "left",
                            20425,
                            0,
                            "easeOutQuad",
                            "${Text6}",
                            '301px',
                            '301px'
                        ],
                        [
                            "eid467",
                            "opacity",
                            19372,
                            1053,
                            "easeOutQuad",
                            "${Text6Copy}",
                            '0',
                            '1'
                        ],
                        [
                            "eid541",
                            "opacity",
                            21750,
                            0,
                            "easeOutQuad",
                            "${Text6Copy}",
                            '1',
                            '1'
                        ],
                        [
                            "eid544",
                            "opacity",
                            23250,
                            0,
                            "easeOutQuad",
                            "${Text6Copy}",
                            '1',
                            '1'
                        ],
                        [
                            "eid464",
                            "opacity",
                            19372,
                            1053,
                            "easeOutQuad",
                            "${Text6}",
                            '0',
                            '1'
                        ],
                        [
                            "eid279",
                            "left",
                            11086,
                            1094,
                            "easeOutQuad",
                            "${_001fw}",
                            '-182px',
                            '108px'
                        ],
                        [
                            "eid413",
                            "opacity",
                            16109,
                            891,
                            "easeOutQuad",
                            "${Text5Copy2}",
                            '0',
                            '1'
                        ],
                        [
                            "eid25",
                            "left",
                            1390,
                            1360,
                            "easeInOutQuad",
                            "${Text}",
                            '-433px',
                            '207px'
                        ],
                        [
                            "eid35",
                            "left",
                            3900,
                            350,
                            "easeOutQuad",
                            "${Text}",
                            '207px',
                            '1207px'
                        ],
                        [
                            "eid313",
                            "top",
                            12844,
                            0,
                            "easeOutQuad",
                            "${_002fw}",
                            '309px',
                            '309px'
                        ],
                        [
                            "eid412",
                            "opacity",
                            16109,
                            891,
                            "easeOutQuad",
                            "${Text5Copy}",
                            '0',
                            '1'
                        ],
                        [
                            "eid10",
                            "top",
                            0,
                            1794,
                            "easeInOutQuad",
                            "${Recurso_2}",
                            '50px',
                            '24px'
                        ],
                        [
                            "eid415",
                            "opacity",
                            16109,
                            891,
                            "easeOutQuad",
                            "${Text5Copy3}",
                            '0',
                            '1'
                        ],
                        [
                            "eid111",
                            "top",
                            5584,
                            0,
                            "easeOutQuad",
                            "${TextCopy}",
                            '278px',
                            '278px'
                        ],
                        [
                            "eid21",
                            "top",
                            0,
                            1390,
                            "easeInOutQuad",
                            "${Rectangle2}",
                            '-382px',
                            '0px'
                        ],
                        [
                            "eid39",
                            "top",
                            4250,
                            410,
                            "easeOutQuad",
                            "${Rectangle2}",
                            '0px',
                            '-381px'
                        ],
                        [
                            "eid414",
                            "opacity",
                            16109,
                            891,
                            "easeOutQuad",
                            "${Text5Copy4}",
                            '0',
                            '1'
                        ],
                        [
                            "eid329",
                            "left",
                            12844,
                            1156,
                            "easeOutQuad",
                            "${_005fw}",
                            '1210px',
                            '877px'
                        ],
                        [
                            "eid378",
                            "left",
                            14854,
                            0,
                            "easeOutQuad",
                            "${_003fw}",
                            '1218px',
                            '1218px'
                        ],
                        [
                            "eid353",
                            "left",
                            14854,
                            82,
                            "easeOutQuad",
                            "${_003fw}",
                            '1208px',
                            '1164px'
                        ],
                        [
                            "eid377",
                            "left",
                            14936,
                            1173,
                            "easeOutQuad",
                            "${_003fw}",
                            '1164px',
                            '859px'
                        ],
                        [
                            "eid411",
                            "opacity",
                            16109,
                            891,
                            "easeOutQuad",
                            "${Text5}",
                            '0',
                            '1'
                        ],
                        [
                            "eid474",
                            "opacity",
                            19372,
                            1053,
                            "easeOutQuad",
                            "${Text6Copy2}",
                            '0.000000',
                            '1'
                        ],
                        [
                            "eid540",
                            "opacity",
                            21750,
                            0,
                            "easeOutQuad",
                            "${Text6Copy2}",
                            '1',
                            '1'
                        ],
                        [
                            "eid491",
                            "left",
                            20425,
                            0,
                            "easeOutQuad",
                            "${Text6Copy2}",
                            '460px',
                            '460px'
                        ],
                        [
                            "eid539",
                            "left",
                            21750,
                            0,
                            "easeOutQuad",
                            "${Text6Copy2}",
                            '460px',
                            '460px'
                        ],
                        [
                            "eid543",
                            "left",
                            23250,
                            0,
                            "easeOutQuad",
                            "${Text6Copy2}",
                            '460px',
                            '460px'
                        ],
                        [
                            "eid348",
                            "left",
                            13852,
                            1148,
                            "easeOutQuad",
                            "${_004fw}",
                            '1236px',
                            '1002px'
                        ],
                        [
                            "eid327",
                            "top",
                            12844,
                            0,
                            "easeOutQuad",
                            "${_005fw}",
                            '18px',
                            '18px'
                        ],
                        [
                            "eid293",
                            "left",
                            10406,
                            1094,
                            "easeOutQuad",
                            "${TextCopy2}",
                            '-401px',
                            '65px'
                        ],
                        [
                            "eid579",
                            "left",
                            11500,
                            166,
                            "easeOutQuad",
                            "${TextCopy2}",
                            '65px',
                            '63px'
                        ],
                        [
                            "eid309",
                            "top",
                            12180,
                            0,
                            "easeOutQuad",
                            "${_001fw}",
                            '18px',
                            '18px'
                        ],
                        [
                            "eid315",
                            "left",
                            11750,
                            1094,
                            "easeOutQuad",
                            "${_002fw}",
                            '-182px',
                            '108px'
                        ]
                    ]
                }
            },
            "Symbol_1": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'Sin_ttulo-2fw',
                            type: 'image',
                            rect: ['-10px', '0px', '548px', '501px', 'auto', 'auto'],
                            fill: ['rgba(0,0,0,0)', 'images/Sin.png', '0px', '0px']
                        },
                        {
                            type: 'rect',
                            id: 'Symbol_3',
                            symbolName: 'Symbol_3',
                            opacity: '0',
                            rect: ['810', '165', '203', '106', 'auto', 'auto']
                        }
                    ],
                    style: {
                        '${symbolSelector}': {
                            isStage: 'true',
                            rect: [undefined, undefined, '548px', '501px']
                        }
                    }
                },
                timeline: {
                    duration: 8750,
                    autoPlay: true,
                    data: [
                        [
                            "eid41",
                            "left",
                            4500,
                            1155,
                            "easeOutQuad",
                            "${Sin_ttulo-2fw}",
                            '0px',
                            '630px'
                        ],
                        [
                            "eid123",
                            "left",
                            7065,
                            1685,
                            "easeOutQuad",
                            "${Sin_ttulo-2fw}",
                            '630px',
                            '-10px'
                        ],
                        [
                            "eid95",
                            "opacity",
                            5655,
                            737,
                            "easeOutQuad",
                            "${Symbol_3}",
                            '0',
                            '1'
                        ],
                        [
                            "eid120",
                            "opacity",
                            6750,
                            500,
                            "easeOutQuad",
                            "${Symbol_3}",
                            '1',
                            '0'
                        ]
                    ]
                }
            },
            "Symbol_2": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [

                    ],
                    style: {
                        '${symbolSelector}': {
                            rect: [null, null, '242px', '196px']
                        }
                    }
                },
                timeline: {
                    duration: 2000,
                    autoPlay: true,
                    data: [

                    ]
                }
            },
            "Symbol_3": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            transform: [[], ['30'], [0, 0, 0], [1, 1, 1]],
                            id: 'Text2Copy10',
                            textStyle: ['0px', '48px', '', '', 'none'],
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [20, 'px'], 'rgba(30,30,30,1.00)', '700', 'none', 'normal', 'break-word', 'nowrap'],
                            type: 'text',
                            rect: ['4px', '8px', 'auto', 'auto', 'auto', 'auto'],
                            align: 'left',
                            text: '<p style=\"margin: 0px;\">​53%</p>'
                        },
                        {
                            transform: [[], ['30'], [0, 0, 0], [1, 1, 1]],
                            id: 'Text2Copy9',
                            textStyle: ['0px', '48px', '', '', 'none'],
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [20, 'px'], 'rgba(30,30,30,1.00)', '700', 'none', 'normal', 'break-word', 'nowrap'],
                            type: 'text',
                            rect: ['50px', '8px', 'auto', 'auto', 'auto', 'auto'],
                            align: 'left',
                            text: '<p style=\"margin: 0px;\">​56%</p>'
                        },
                        {
                            transform: [[], ['30'], [0, 0, 0], [1, 1, 1]],
                            id: 'Text2Copy8',
                            textStyle: ['0px', '48px', '', '', 'none'],
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [20, 'px'], 'rgba(30,30,30,1.00)', '700', 'none', 'normal', 'break-word', 'nowrap'],
                            type: 'text',
                            rect: ['125px', '50px', 'auto', 'auto', 'auto', 'auto'],
                            align: 'left',
                            text: '<p style=\"margin: 0px;\">​56%</p>'
                        },
                        {
                            transform: [[], ['30'], [0, 0, 0], [1, 1, 1]],
                            id: 'Text2Copy7',
                            textStyle: ['0px', '48px', '', '', 'none'],
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [20, 'px'], 'rgba(30,30,30,1.00)', '700', 'none', 'normal', 'break-word', 'nowrap'],
                            type: 'text',
                            rect: ['161px', '72px', 'auto', 'auto', 'auto', 'auto'],
                            align: 'left',
                            text: '<p style=\"margin: 0px;\">​54%</p>'
                        },
                        {
                            transform: [[], ['30'], [0, 0, 0], [1, 1, 1]],
                            id: 'Text2Copy6',
                            textStyle: ['0px', '48px', '', '', 'none'],
                            font: ['\'Trebuchet MS\', Arial, Helvetica, sans-serif', [20, 'px'], 'rgba(30,30,30,1.00)', '700', 'none', 'normal', 'break-word', 'nowrap'],
                            type: 'text',
                            rect: ['101px', '8px', 'auto', 'auto', 'auto', 'auto'],
                            align: 'left',
                            text: '<p style=\"margin: 0px;\">70%</p>'
                        }
                    ],
                    style: {
                        '${symbolSelector}': {
                            rect: [null, null, '203px', '106px']
                        }
                    }
                },
                timeline: {
                    duration: 0,
                    autoPlay: true,
                    data: [

                    ]
                }
            },
            "Symbol_4": {
                version: "6.0.0",
                minimumCompatibleVersion: "5.0.0",
                build: "6.0.0.400",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            rect: ['0px', '0px', '90px', '435px', 'auto', 'auto'],
                            id: '_012fw',
                            opacity: '0',
                            type: 'image',
                            fill: ['rgba(0,0,0,0)', 'images/012.fw.png', '0px', '0px']
                        },
                        {
                            rect: ['73px', '107px', '35px', '171px', 'auto', 'auto'],
                            id: '_03fw',
                            opacity: '0',
                            type: 'image',
                            fill: ['rgba(0,0,0,0)', 'images/03.fw.png', '0px', '0px']
                        },
                        {
                            rect: ['-55px', '107px', '32px', '170px', 'auto', 'auto'],
                            id: '_02fw',
                            opacity: '0',
                            type: 'image',
                            fill: ['rgba(0,0,0,0)', 'images/02.fw.png', '0px', '0px']
                        }
                    ],
                    style: {
                        '${symbolSelector}': {
                            isStage: 'true',
                            rect: [undefined, undefined, '90px', '435px']
                        }
                    }
                },
                timeline: {
                    duration: 25000,
                    autoPlay: true,
                    data: [
                        [
                            "eid142",
                            "opacity",
                            8319,
                            1107,
                            "easeOutQuad",
                            "${_03fw}",
                            '0',
                            '1'
                        ],
                        [
                            "eid218",
                            "height",
                            9500,
                            0,
                            "easeOutQuad",
                            "${_02fw}",
                            '170px',
                            '170px'
                        ],
                        [
                            "eid209",
                            "top",
                            9000,
                            0,
                            "easeOutQuad",
                            "${_02fw}",
                            '107px',
                            '107px'
                        ],
                        [
                            "eid208",
                            "top",
                            9426,
                            1421,
                            "easeOutQuad",
                            "${_02fw}",
                            '107px',
                            '99px'
                        ],
                        [
                            "eid139",
                            "opacity",
                            8319,
                            1107,
                            "easeOutQuad",
                            "${_02fw}",
                            '0',
                            '1'
                        ],
                        [
                            "eid188",
                            "left",
                            9000,
                            426,
                            "easeOutQuad",
                            "${_02fw}",
                            '-18px',
                            '-17px'
                        ],
                        [
                            "eid207",
                            "left",
                            9426,
                            74,
                            "easeOutQuad",
                            "${_02fw}",
                            '-17px',
                            '-21px'
                        ],
                        [
                            "eid214",
                            "left",
                            9500,
                            1347,
                            "easeOutQuad",
                            "${_02fw}",
                            '-21px',
                            '-55px'
                        ],
                        [
                            "eid154",
                            "rotateZ",
                            9426,
                            1421,
                            "easeOutQuad",
                            "${_03fw}",
                            '0deg',
                            '-27deg'
                        ],
                        [
                            "eid219",
                            "width",
                            9500,
                            0,
                            "easeOutQuad",
                            "${_02fw}",
                            '32px',
                            '32px'
                        ],
                        [
                            "eid147",
                            "rotateZ",
                            9426,
                            1421,
                            "easeOutQuad",
                            "${_02fw}",
                            '0deg',
                            '31deg'
                        ],
                        [
                            "eid150",
                            "-webkit-transform-origin",
                            10847,
                            0,
                            "easeOutQuad",
                            "${_03fw}",
                            [35.33,6.76],
                            [35.33,6.76],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid656",
                            "-moz-transform-origin",
                            10847,
                            0,
                            "easeOutQuad",
                            "${_03fw}",
                            [35.33,6.76],
                            [35.33,6.76],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid657",
                            "-ms-transform-origin",
                            10847,
                            0,
                            "easeOutQuad",
                            "${_03fw}",
                            [35.33,6.76],
                            [35.33,6.76],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid658",
                            "msTransformOrigin",
                            10847,
                            0,
                            "easeOutQuad",
                            "${_03fw}",
                            [35.33,6.76],
                            [35.33,6.76],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid659",
                            "-o-transform-origin",
                            10847,
                            0,
                            "easeOutQuad",
                            "${_03fw}",
                            [35.33,6.76],
                            [35.33,6.76],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid660",
                            "transform-origin",
                            10847,
                            0,
                            "easeOutQuad",
                            "${_03fw}",
                            [35.33,6.76],
                            [35.33,6.76],
                            {valueTemplate: '@@0@@% @@1@@%'}
                        ],
                        [
                            "eid136",
                            "opacity",
                            0,
                            0,
                            "easeOutQuad",
                            "${_012fw}",
                            '0',
                            '0'
                        ],
                        [
                            "eid135",
                            "opacity",
                            8319,
                            1107,
                            "easeOutQuad",
                            "${_012fw}",
                            '0',
                            '1'
                        ],
                        [
                            "eid581",
                            "opacity",
                            12500,
                            0,
                            "easeOutQuad",
                            "${_012fw}",
                            '1',
                            '1'
                        ],
                        [
                            "eid582",
                            "opacity",
                            14921,
                            0,
                            "easeOutQuad",
                            "${_012fw}",
                            '1',
                            '1'
                        ],
                        [
                            "eid594",
                            "opacity",
                            16177,
                            0,
                            "easeOutQuad",
                            "${_012fw}",
                            '1',
                            '1'
                        ],
                        [
                            "eid583",
                            "opacity",
                            20750,
                            0,
                            "easeOutQuad",
                            "${_012fw}",
                            '1',
                            '1'
                        ],
                        [
                            "eid595",
                            "opacity",
                            25000,
                            0,
                            "easeOutQuad",
                            "${_012fw}",
                            '1',
                            '1'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("banner_xplorate_edgeActions.js");
})("EDGE-512749987");
