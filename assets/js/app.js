// jQuery(document).ready(function () {
//   stickyNavMenu();
// });

// function stickyNavMenu() {
//   jQuery(window).scroll(function () {
//     if(jQuery(this).scrollTop() >120) {
//       jQuery(".header").addClass("fixed");
//     } else {
//       jQuery(".header").removeClass('fixed')
//     }
//   })
// }


// var Example = Example || {};

// Example.circleStack = function() {
//     var Engine = Matter.Engine,
//         Render = Matter.Render,
//         Runner = Matter.Runner,
//         Composites = Matter.Composites,
//         MouseConstraint = Matter.MouseConstraint,
//         Mouse = Matter.Mouse,
//         Composite = Matter.Composite,
//         Bodies = Matter.Bodies;

//     // create engine
//     var engine = Engine.create(),
//         world = engine.world;

//     // create renderer
//     var render = Render.create({
//         element: document.body,
//         engine: engine,
//         options: {
//             width: 800,
//             height: 600,
//             showAngleIndicator: true
//         }
//     });

//     Render.run(render);

//     // create runner
//     var runner = Runner.create();
//     Runner.run(runner, engine);

//     // add bodies
//     var stack = Composites.stack(100, 600 - 21 - 20 * 20, 10, 10, 20, 0, function(x, y) {
//         return Bodies.circle(x, y, 20);
//     });
    
//     Composite.add(world, [
//         // walls
//         Bodies.rectangle(400, 0, 800, 50, { isStatic: true }),
//         Bodies.rectangle(400, 600, 800, 50, { isStatic: true }),
//         Bodies.rectangle(800, 300, 50, 600, { isStatic: true }),
//         Bodies.rectangle(0, 300, 50, 600, { isStatic: true }),
//         stack
//     ]);

//     // add mouse control
//     var mouse = Mouse.create(render.canvas),
//         mouseConstraint = MouseConstraint.create(engine, {
//             mouse: mouse,
//             constraint: {
//                 stiffness: 0.2,
//                 render: {
//                     visible: false
//                 }
//             }
//         });

//     Composite.add(world, mouseConstraint);

//     // keep the mouse in sync with rendering
//     render.mouse = mouse;
    
//     // fit the render viewport to the scene
//     Render.lookAt(render, {
//         min: { x: 0, y: 0 },
//         max: { x: 800, y: 600 }
//     });
    
//     // context for MatterTools.Demo
//     return {
//         engine: engine,
//         runner: runner,
//         render: render,
//         canvas: render.canvas,
//         stop: function() {
//             Matter.Render.stop(render);
//             Matter.Runner.stop(runner);
//         }
//     };
// };

// Example.circleStack.title = 'Circle Stack';
// Example.circleStack.for = '>=0.14.2';

// if (typeof module !== 'undefined') {
//     module.exports = Example.circleStack;
// }

// //////////////////////////////

// (function() {

//   var Engine = Matter.Engine,
//       World = Matter.World,
//       Bodies = Matter.Bodies,
//       Body = Matter.Body,
//       Composite = Matter.Composite,
//       Composites = Matter.Composites,
//       Common = Matter.Common,
//       Constraint = Matter.Constraint,
//       Events = Matter.Events;

//   var Demo = {};

//   var _engine,
//       _sceneName;

//     Body.create = function(options) {
//       var defaults = {
//           id: Body.nextId(),
//           angle: 0,
//           position: { x: 0, y: 0 },
//           force: { x: 0, y: 0 },
//           torque: 0,
//           positionImpulse: { x: 0, y: 0 },
//           speed: 0,
//           angularSpeed: 0,
//           velocity: { x: 0, y: 0 },
//           angularVelocity: 0,
//           isStatic: false,
//           isSleeping: false,
//           motion: 1,
//           sleepThreshold: 60,
//           density: 0.001,
//           restitution: 0,
//           friction: 0.1,
//           frictionAir: 0.01,
//           path: 'L 0 0 L 40 0 L 40 40 L 0 40',
//           fillStyle: options.isStatic ? 'rgba(255,255,93,0.4)' : Common.choose(['#ffffff']),
//           strokeStyle:'rgb(255,255,255)',
//           strokeWidth: 0,
//           lineWidth: 0,
//           groupId: 0,
//           slop: 0.5
//       };

//       var body = Common.extend(defaults, options);

//       Body.updateProperties(body);

//       return body;
//   };
  
//   Demo.init = function() {
//       var container = document.getElementById('canvas-container');

//       // engine options - these are the defaults
//       var options = {
//           positionIterations: 6,
//           velocityIterations: 6,
//           enableSleeping: false,
//           timeScale: 1
//       };

//       // create a Matter engine, with the element to insert the canvas into
//       // NOTE: this is actually Matter.Engine.create(), see the aliases at top of this file
//       _engine = Engine.create(container, options);

//       // run the engine
//       Engine.run(_engine);

//       // default scene function name
//       _sceneName = 'avalanche';
      
//       // get the scene function name from hash
//       if (window.location.hash.length !== 0) 
//           _sceneName = window.location.hash.replace('#', '');

//       // set up a scene with bodies
//       Demo[_sceneName]();
//   };

//   if (window.addEventListener) {
//       window.addEventListener('load', Demo.init);
//   } else if (window.attachEvent) {
//       window.attachEvent('load', Demo.init);
//   }
  
//   Demo.avalanche = function() {
//       var _world = _engine.world;
      
//      //Demo.reset();
//       _engine.enableSleeping = false;
//       _engine.world.gravity.y = 1.5;
    
//       var renderOptions = _engine.render.options;
//       renderOptions.wireframes = false;        
//       renderOptions.backgroundImage = 'linear-gradient(to right, rgb(120, 208, 243) , #FFFFFF)';

//       var offset = 5;
//       World.addBody(_world, Bodies.rectangle(400, 600 + offset, 800.5 + 2 * offset, 50.5, { isStatic: true }));
//       World.addBody(_world, Bodies.rectangle(800 + offset, 300, 50.5, 600.5 + 2 * offset, { isStatic: true }));
//       World.addBody(_world, Bodies.rectangle(-offset, 300, 50.5, 600.5 + 2 * offset, { isStatic: true }));
      
    
//       var stack = Composites.stack(100, 10, 10, 10, 0, 0, function(x, y, column, row) {
//           return Bodies.circle(x, y, 25);
//       });
      
//       World.addComposite(_world, stack);
      
//       World.addBody(_world, Bodies.rectangle(400, 300, 50, 50, { isStatic : true}));

//   };

// })();


// Matter.js module aliases
var Engine = Matter.Engine,
    World = Matter.World,
    Bodies = Matter.Bodies,
    Common = Matter.Common,
    Constraint = Matter.Constraint,
    Composites = Matter.Composites,
    MouseConstraint = Matter.MouseConstraint;

// create a Matter.js engine
var engine = Engine.create(document.body, {
    render: {
        options: {
            width: 1350,
            height: 343,
            background: 'transparent',
            hasBounds: false,
            enabled: true,
            wireframes: false,
            showSleeping: true,
            showDebug: false,
            showBroadphase: false,
            showBounds: true,
            showVelocity: false,
            showCollisions: false,
            showAxes: false,
            showPositions: false,
            showAngleIndicator: false,
            showIds: false,
            showShadows: true
        }
    }
});

// Engine Options
var world = World.create({
    bounds: { 
        min: { x: 0, y: 0 }, 
        max: { x: 1350, y: 665 } 
    }
});

// Gravity Options
engine.world.gravity.y = 0;
engine.world.gravity.x = 0;

// Friction/Air Friction
engine.world.friction = 0;
engine.world.frictionAir = 0;



//add a mouse-controlled constraint
var mouseConstraint = MouseConstraint.create(engine);
World.add(engine.world, mouseConstraint);


 

// create circles
var circleThing = {

    density: 1,
    restitution: 1,
    speed: 1,
    friction: 0,
    frictionAir: 0
};

var boxA = Bodies.circle(400, 200, 75, circleThing);
var boxB = Bodies.circle(200, 300, 75, circleThing);
var boxC = Bodies.circle(250, 25, 75, circleThing);
var boxD = Bodies.circle(100, 200, 75, circleThing);
var boxE = Bodies.circle(100, 250, 75, circleThing);
var boxF = Bodies.circle(125, 220, 75, circleThing);
var boxG = Bodies.circle(150, 150, 75, circleThing);
var boxH = Bodies.circle(130, 270, 75, circleThing);
var boxI = Bodies.circle(140, 210, 75, circleThing);
var boxJ = Bodies.circle(110, 220, 75, circleThing);
var boxK = Bodies.circle(100, 100, 75, circleThing);

// Velocity
Matter.Body.applyForce(boxA, {x: 50 , y: 50}, {x: 5, y: 5 });
Matter.Body.applyForce(boxB, {x: 150 , y: 150}, {x: 40, y: 40 });
Matter.Body.applyForce(boxC, {x: 150 , y: 150}, {x: 40, y: 40 });
Matter.Body.applyForce(boxD, {x: 150 , y: 150}, {x: 40, y: 40 });


// some settings
var offset = 30,
    wallOptions = { 
        isStatic: true
    };

// add all of the bodies to the world
World.add(engine.world, [boxA, boxB, boxC, boxD, boxE, boxF, boxG, boxH, boxI, boxJ,boxK]);




// run the engine
Engine.run(engine);