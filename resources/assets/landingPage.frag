precision highp float;

uniform vec2 u_resolution;
uniform vec2 u_mouse;
uniform float u_time;
varying vec2 vPos;

vec2 random2( vec2 p ) {
    return fract(sin(vec2(dot(p,vec2(127.1,311.7)),dot(p,vec2(269.5,183.3))))*43758.5453);
}

void main() {
    // vec2 st = gl_FragCoord.xy/u_resolution.xy;
    // st.x *= u_resolution.x/u_resolution.y;
    vec2 st = vPos;
    vec3 color = vec3(0.975,0.501,0.094);

    // Scale
    st *= 3.712;

    // Tile the space
    vec2 i_st = floor(st);
    vec2 f_st = fract(st);

    float m_dist = 10.;  // minimun distance
    vec2 m_point;        // minimum point

    for (int j=-1; j<=1; j++ ) {
        for (int i=-1; i<=1; i++ ) {
            vec2 neighbor = vec2(float(i),float(j));
            vec2 point = random2(i_st + neighbor);
            point = -0.292 + 0.516*sin(u_time + 6.2831*point);
            vec2 diff = neighbor + point - f_st;
            float dist = length(diff);

            if( dist < m_dist ) {
                m_dist = dist;
                m_point = point;
            }
        }
    }

    // Assign a color using the closest point position
    color += dot(m_point,vec2(.3,.6));

    // Show isolines
    color -= abs(sin(40.0*m_dist))*0.07;

    gl_FragColor = vec4(color,0.984);
}
