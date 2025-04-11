// Deny all inbound traffic on WAN
$config['filter']['rule'][] = array(
    'type' => 'block',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'any',
    'source' => array('any' => true),
    'destination' => array('any' => true),
    'descr' => 'Default deny inbound',
);

// === ALLOW RULES ON WAN FOR LAN SCORING SERVICES ===
$lan_ip = '10.X.1.0/24';

// SSH
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => $lan_ip, 'port' => '22'),
    'descr' => 'Allow SSH from WAN to LAN',
);

// ICMP
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'icmp',
    'source' => array('any' => true),
    'destination' => array('network' => $lan_ip),
    'descr' => 'Allow ICMP from WAN to LAN',
);

// DNS
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'udp',
    'source' => array('any' => true),
    'destination' => array('network' => $lan_ip, 'port' => '53'),
    'descr' => 'Allow DNS from WAN to LAN',
);

// LDAP
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => $lan_ip, 'port' => '389'),
    'descr' => 'Allow LDAP from WAN to LAN',
);

// HTTP
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => $lan_ip, 'port' => '80'),
    'descr' => 'Allow HTTP from WAN to LAN',
);

// MySQL
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => $lan_ip, 'port' => '3306'),
    'descr' => 'Allow MySQL from WAN to LAN',
);

// WinRM (commonly port 5985 for HTTP, 5986 for HTTPS)
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => $lan_ip, 'port' => '5985'),
    'descr' => 'Allow WinRM from WAN to LAN',
);

// === ALLOW RULES ON WAN FOR DMZ SCORING SERVICES ===
$dmz_ip = '10.X.2.0/24';

// HTTP
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => $dmz_ip, 'port' => '80'),
    'descr' => 'Allow HTTP from WAN to DMZ',
);

// FTP (Port 21 - basic control channel only)
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => $dmz_ip, 'port' => '21'),
    'descr' => 'Allow FTP from WAN to DMZ',
);

// MySQL
$config['filter']['rule'][] = array(
    'type' => 'pass',
    'interface' => 'wan',
    'ipprotocol' => 'inet',
    'protocol' => 'tcp',
    'source' => array('any' => true),
    'destination' => array('network' => $dmz_ip, 'port' => '3306'),
    'descr' => 'Allow MySQL from WAN to DMZ',
);

// Save and apply
write_config();
filter_configure();
